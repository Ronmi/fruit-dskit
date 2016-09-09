<?php

namespace FruitTest\DSKit;

use Fruit\DSKit\ArraySet;

class ArraySetTest extends \PHPUnit_Framework_TestCase
{
    public function testAddAndLen()
    {
        $s = new ArraySet();
        $this->assertEquals(0, $s->len());
        $s->add(1);
        $this->assertEquals(1, $s->len());
        $s->add(1);
        $this->assertEquals(1, $s->len());
        $s->add(0);
        $this->assertEquals(2, $s->len());
    }

    public function testAddAndHas()
    {
        $s = new ArraySet();
        $this->assertFalse($s->has(1));
        $s->add(1);
        $this->assertTrue($s->has(1));
        $s->add(1);
        $this->assertTrue($s->has(1));
        $s->add(2);
        $this->assertTrue($s->has(1));
    }

    public function testDel()
    {
        $s = new ArraySet();
        $s->add(1);
        $s->add(2);
        $s->del(1);
        $this->assertFalse($s->has(1));
        $this->assertTrue($s->has(2));
    }

    public function testToArray()
    {
        $s = new ArraySet();
        $s->add(1);
        $s->add(2);

        $this->assertEquals(array(1, 2), $s->toArray());
    }

    public function testIterator()
    {
        $s = new ArraySet();
        $s->add(1);
        $s->add(2);

        $arr = array();
        foreach ($s->iterator() as $v) {
            array_push($arr, $v);
        }
        $this->assertEquals(array(1, 2), $arr);
    }
}
