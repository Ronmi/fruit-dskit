<?php

namespace Fruit\DSKit;

/**
 * An array based set implementation
 */
class ArraySet implements Set
{
    private $data;

    public function __construct()
    {
        $this->data = array();
    }

    public function has($data)
    {
        return isset($this->data[$data]);
    }

    public function add($data)
    {
        $this->data[$data] = true;
    }

    public function del($data)
    {
        unset($this->data[$data]);
    }

    public function len()
    {
        return count($this->data);
    }

    public function toArray()
    {
        return array_keys($this->data);
    }

    public function iterator()
    {
        return new \ArrayIterator(array_keys($this->data));
    }
}
