<?php

namespace Fruit\DSKit;

/**
 * Collection defines common methods of collection data structure.
 */
interface Collection
{
    /**
     * Returns an iterator to iterate this collection
     */
    public function iterator();
    /// convert to array
    public function toArray();
    /// size of the collection
    public function len();
}
