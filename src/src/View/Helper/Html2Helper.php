<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Html2 helper
 */
class Html2Helper extends Helper\HtmlHelper
{
    public function __construct(View $View, array $config = [])
    {
        parent::__construct($View, $config);
    }

    public function iconLink($title, $icon, $uri, $options = null) {
        if (!isset($options)) {
            $options = [];
        }
        $options['escape'] = false;
        if (isset($options['class'])) {
            $options['class'] .= ' icon-link';
        }
        else {
            $options['class'] = 'icon-link';
        }

        return $this->link($this->tag('span', '', ['class' => 'ui-icon ' . $icon]) . $this->tag('span', $title, ['class' => 'icon-link-text']), $uri, $options);
    }
}
