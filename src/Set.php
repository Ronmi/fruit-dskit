<?php

namespace Fruit\DSKit;

/**
 * Represents a mathematical set
 */
interface Set extends Collection
{
    /// add one data into the set, no-op if exists
    public function add($data);
    /// delete data from the set, no-op if non-exists
    public function del($data);
    /// detect if data is in the set
    public function has($data);
}
