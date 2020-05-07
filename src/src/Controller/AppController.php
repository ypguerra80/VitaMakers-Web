<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use App\Model\Table\FilterValuesTable;
use App\Utility\FilterDefinition;
use App\Utility\FilterOperator;
use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @property FilterValuesTable FilterValues
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Auth', [
            'unauthorizedRedirect' => $this->referer(), // If unauthorized, return them to page they were just on
            'authorize' => ['Controller']
        ]);
        /*
         * Enable the following components for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        $this->loadComponent('Flash');
        $this->loadComponent('Csrf');
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Http\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        // Note: These defaults are just to get started quickly with development
        // and should not be used in production. You should instead set "_serialize"
        // in each action as required.
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }

    function isAuthorized($user)
    {
        return true;
    }

    public function beforeFilter(Event $event)
    {
        $loggedUser = $this->Auth->user();
        $this->set(compact(['loggedUser']));

        if ($this->request->action == 'index' || $this->request->action == 'toggle') {
            $this->getEventManager()->off($this->Csrf);
        }

        return parent::beforeFilter($event);
    }

    /**
     * @param string|null $path
     * @return array
     */
    protected function getCountryFilter($path = null)
    {
        if ($this->Auth->user('admin')) {
            return [];
        }
        return ['conditions' => [($path ? $path . '.' : '') . 'country_id' => $this->Auth->user('country_id')]];
    }

    /**
     * @param string|null $path
     * @return array
     */
    protected function getCountryAndCityFilter($path = null)
    {
        if ($this->Auth->user('admin')) {
            return [];
        }
        return ['conditions' => [
            ($path ? $path . '.' : '') . 'country_id' => $this->Auth->user('country_id'),
            ($path ? $path . '.' : '') . 'city_id' => $this->Auth->user('city_id')
        ]];
    }

    /**
     * @param string|null $path
     * @return array
     */
    protected function getOwnershipFilter($path = null, $strict = false)
    {
        if ($this->Auth->user('admin')) {
            return [];
        }
        if(!$strict){
            return ['conditions' => [
                'OR' => [
                    ($path ? $path . '.' : '') . 'user_id' => $this->Auth->user('id'),
                    ($path ? $path . '.' : '') . 'user_id IS NULL'
                ]
            ]];
        }else{
            return ['conditions' => [($path ? $path . '.' : '') . 'user_id' => $this->Auth->user('id')]];
        }


    }

    /**
     * @param string $entityName
     * @param array $filterDefinitions
     * @return array|null
     */
    protected function createFiltersForEntity($entityName, $filterDefinitions)
    {
        $this->loadModel('FilterValues');
        $filterValuesTable = $this->FilterValues;

        if ($this->request->is('get')) {
            $filterValues = $filterValuesTable->find('all', ['conditions' => ['user_id' => $this->Auth->user('id'), 'entity' => $entityName]])->toList();

            $filterData = $this->request->getParam('?');

            if (!$filterData) {
                $filterData = [];
            }

            foreach ($filterData as $path => $value) {
                if (substr($path, 0, 1) == '_' || $path == 'page' || $path == 'sort' || $path == 'direction') {
                    continue;
                }
                $realPath = str_replace('-', '.', $path);

                $found = array_filter($filterValues, function ($filter) use (&$realPath) {
                    return $filter->filter == $realPath;
                });
                $found = reset($found);

                if (!$found) {
                    if ((isset($value['value']) && $value['value'] !== null && $value['value'] !== "") ||
                        $value['operator'] == FilterOperator::IS_NULL || $value['operator'] == FilterOperator::IS_NOT_NULL) {
                        $newFilter = $filterValuesTable->newEntity();
                        $newFilter->user_id = $this->Auth->user('id');
                        $newFilter->entity = $entityName;
                        $newFilter->filter = $realPath;
                        $newFilter->operator = isset($value['operator']) ? $value['operator'] : null;
                        $newFilter->value = isset($value['value']) ? $value['value'] : null;

                        $filterValuesTable->save($newFilter);
                    }
                } else {
                    if ((!isset($value['value']) || $value['value'] === null || $value['value'] === "") &&
                        ($value['operator'] != FilterOperator::IS_NULL && $value['operator'] != FilterOperator::IS_NOT_NULL)) {
                        $filterValuesTable->delete($found);
                    } else {
                        $found->operator = isset($value['operator']) ? $value['operator'] : null;
                        $found->value = isset($value['value']) ? $value['value'] : null;
                        $filterValuesTable->save($found);
                    }
                }
            }
        }

        $filterValues = $filterValuesTable->find('all', ['conditions' => ['user_id' => $this->Auth->user('id'), 'entity' => $entityName]])->toList();

        $filters = [];
        $conditions = [];

        /** @var FilterDefinition $filterDefinition */
        foreach ($filterDefinitions as $filterDefinition) {
            $found = array_filter($filterValues, function ($filter) use (&$filterDefinition) {
                return $filter->filter == $filterDefinition->getPath();
            });
            $found = reset($found);
            if ($found) {
                $filterDefinition->operator = $found->operator;
                $filterDefinition->value = $found->value;
            }
            $filters[] = $filterDefinition;

            $condition = $filterDefinition->buildCondition();
            if ($condition) {
                $conditions[] = $condition;
            }
        }

        $action = $this->request->action;

        $this->set('filterEntityName', $entityName);
        $this->set(compact('filters', 'action'));

        return count($conditions) > 0 ? ['conditions' => $conditions] : null;
    }
}
