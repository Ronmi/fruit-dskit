<?php

namespace Fruit\DSKit;

class Bijection implements Collection
{
    private $kv;
    private $vk;
    private $vset;

    public function __construct()
    {
        $this->kv = array();
        $this->vk = array();
    }

    public function set($k, $v)
    {
        if (array_key_exists($v, $this->vk)) {
            return;
        }
        if (array_key_exists($k, $this->kv)) {
            $old = $this->kv[$k];
            unset($this->vk[$old]);
        }

        $this->kv[$k] = $v;
        $this->vk[$v] = $k;
    }

    public function remove($k)
    {
        if (!array_key_exists($k, $this->kv)) {
            return;
        }

        $v = $this->kv[$k];
        unset($this->kv[$k]);
        unset($this->vk[$v]);
    }

    public function get($k)
    {
        return $this->kv[$k];
    }

    public function has($k)
    {
        return array_key_exists($k, $this->kv);
    }

    public function getv($v)
    {
        return $this->vk[$v];
    }

    public function hasv($v)
    {
        return array_key_exists($v, $this->vk);
    }

    public function removev($v)
    {
        if (!array_key_exists($v, $this->vk)) {
            return;
        }

        $k = $this->vk[$v];
        unset($this->vk[$v]);
        unset($this->kv[$k]);
    }

    public function len()
    {
        return count($this->kv);
    }

    public function toArray()
    {
        return $this->kv;
    }

    public function iterator()
    {
        return new \ArrayIterator($this->kv);
    }
}
