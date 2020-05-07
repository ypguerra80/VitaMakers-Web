<?php

namespace App\Model\Table;


use App\Utility\AudioUtils;
use App\Utility\ImageUtils;
use Cake\ORM\Table;
use SoftDelete\Model\Table\SoftDeleteTrait;
/**
 * Class AppTable
 * @package App\Model\Table
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 *
 */
abstract class AppTable extends Table
{
    var $maximumFileSize = 2097152;

    use SoftDeleteTrait;

    public function initialize(array $config)
    {
        parent::initialize($config);

        if ($this->usePreventCascade()) {
            $this->addBehavior('PreventCascade');
        }

        $this->addBehavior('Timestamp');
    }

    protected function usePreventCascade() {
        return true;
    }
    
    function imageMimeType($value, $context)
    {
        return empty($context['data'][$context['field'] . '_type']) || ImageUtils::typeIsImage($context['data'][$context['field'] . '_type']);
    }

    function audioMimeType($value, $context)
    {
        return empty($context['data'][$context['field'] . '_type']) || AudioUtils::typeIsAudio($context['data'][$context['field'] . '_type']);
    }

    function maxLengthBytesWhen($context)
    {
        return is_string($context['data'][$context['field']]);
    }
}