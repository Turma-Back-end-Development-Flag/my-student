<?php

use App\Models\Person;

/**
 * Unit test example
 */
class PersonTest extends TestCase
{
  public function testGetName()
  {
    $case = new Person();
    $case->name = 'John Doe';

    $this->assertEquals('John Doe', $case->getName());
  }
}
