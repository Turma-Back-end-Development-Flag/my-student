<?php

class BasicTest extends TestCase
{
  public function testAssertTrue()
  {
    $this->assertTrue('a' === 'a');
  }

  public function testAssetFalse()
  {
    $this->assertFalse('a' === 'b');
  }

  public function testAssertOthers()
  {
    $value = 'foo';
    $this->assertEquals('foo', $value);

    $this->assertNull(null);

    $fruits = ['orange', 'peach'];
    $this->assertContains('orange', $fruits);

    $this->assertCount(2, $fruits);

    $this->assertEmpty('');
  }
}
