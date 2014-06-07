<?php
namespace HoerAPI;

abstract class Iterator implements \Iterator {
    public $list = array();
    protected $position = 0;

    abstract public function __construct(array $data = array());

    public final function rewind() {
        $this->position = 0;
    }

    public final function current() {
        return $this->list[$this->position];
    }

    public final function key() {
        return $this->position;
    }

    public final function next() {
        $this->position++;
    }

    public final function valid() {
        return isset($this->list[$this->position]);
    }
}