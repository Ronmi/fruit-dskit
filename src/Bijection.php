<?php

namespace Fruit\DSKit;

/**
 * Mapping data represents a bijective function.
 *
 * Bijection guarantees the stored data are mapped one-to-one
 * and onto. In other words, every key maps to a distinct value,
 * and vice versa.
 */
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

    /// set mapping relation, no-op if not one-to-one and onto
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

    /// remove a mapping relation by key, no-op if not exist
    public function remove($k)
    {
        if (!array_key_exists($k, $this->kv)) {
            return;
        }

        $v = $this->kv[$k];
        unset($this->kv[$k]);
        unset($this->vk[$v]);
    }

    /// get value by key
    public function get($k)
    {
        if (array_key_exists($k, $this->kv)) {
            return $this->kv[$k];
        }
    }

    /// detect if key exists
    public function has($k)
    {
        return array_key_exists($k, $this->kv);
    }

    /// get key by value
    public function getv($v)
    {
        if (array_key_exists($v, $this->vk)) {
            return $this->vk[$v];
        }
    }

    /// detect if value exists
    public function hasv($v)
    {
        return array_key_exists($v, $this->vk);
    }

    /// remove a mapping relation by value, no-op if not exist
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
