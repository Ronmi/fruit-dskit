<?php

namespace FruitTest\DSKit;

use Fruit\DSKit\Bijection;

class BijectionTest extends \PHPUnit_Framework_TestCase
{
    public function testSetAndLen()
    {
        $b = new Bijection();
        $this->assertEquals(0, $b->len());
        $b->set('a', 1);
        $this->assertEquals(1, $b->len());
        $b->set('a', 2);
        $this->assertEquals(1, $b->len());
        $b->set('b', 2);
        $this->assertEquals(1, $b->len());
        $b->set('b', 1);
        $this->assertEquals(2, $b->len());
    }

    public function testSetAndHas()
    {
        $b = new Bijection();
        $this->assertFalse($b->has('a'));
        $b->set('a', 1);
        $this->assertTrue($b->has('a'));
        $b->set('a', 2);
        $this->assertTrue($b->has('a'));
        $b->set('b', 2);
        $this->assertTrue($b->has('a'));
        $this->assertFalse($b->has('b'));
        $b->set('b', 1);
        $this->assertTrue($b->has('b'));
    }

    public function testSetAndHasv()
    {
        $b = new Bijection();
        $this->assertFalse($b->hasv(1));
        $b->set('a', 1);
        $this->assertTrue($b->hasv(1));
        $b->set('a', 2);
        $this->assertFalse($b->hasv(1));
        $this->assertTrue($b->hasv(2));
        $b->set('b', 2);
        $this->assertFalse($b->hasv(1));
        $this->assertTrue($b->hasv(2));
        $b->set('b', 1);
        $this->assertTrue($b->hasv(1));
        $this->assertTrue($b->hasv(2));
    }

    public function testGet()
    {
        $b = new Bijection();
        $b->set('a', 1);
        $this->assertEquals(1, $b->get('a'));
        $b->set('a', 2);
        $this->assertEquals(2, $b->get('a'));
    }

    public function testGetv()
    {
        $b = new Bijection();
        $b->set('a', 1);
        $this->assertEquals('a', $b->getv(1));
        $b->set('a', 2);
        $this->assertEquals('a', $b->getv(2));
    }

    public function testRemove()
    {
        $b = new Bijection();
        $b->set(1, 'a');
        $b->remove(1);
        $this->assertEquals(0, $b->len());
        $this->assertFalse($b->has(1));
        $this->assertFalse($b->hasv('a'));
    }

    public function testRemovev()
    {
        $b = new Bijection();
        $b->set('a', 1);
        $b->removev(1);
        $this->assertEquals(0, $b->len());
        $this->assertFalse($b->hasv(1));
        $this->assertFalse($b->has('a'));
    }

    public function testToArray()
    {
        $b = new Bijection();
        $b->set('a', 1);
        $this->assertEquals(array('a' => 1), $b->toArray());
    }

    public function testIterator()
    {
        $s = new Bijection();
        $s->set('a', 1);

        $arr = array();
        foreach ($s->iterator() as $v) {
            array_push($arr, $v);
        }
        $this->assertEquals(array(1), $arr);
    }
}
