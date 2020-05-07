<?php

namespace App\Model\DTOs;
use Cake\I18n\FrozenTime;


/**
 * Class BaseDTO
 * @package App\Model\DTOs
 */
class BaseDTO
{
    /**
     * @var int
     */
    var $id;
    /**
     * @var string
     */
    var $modified;
    /**
     * @var string
     */
    var $deleted;

    /**
     * BaseDTO constructor.
     * @param int $id
     * @param $modified
     * @param $deleted
     */
    public function __construct($id, $modified, $deleted)
    {
        $this->id = $id;
        $this->modified = $this->formatTime($modified);
        $this->deleted = $this->formatTime($deleted);
    }

    /**
     * @param FrozenTime|null $time
     * @return string|null
     */
    protected function formatTime($time) {
        return $time ? $time->format("Y-m-d\TH:i:sP") : null;
    }
}