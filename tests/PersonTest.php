<?php

use App\Models\Person;

/**
 * Unit test example
 */
class PersonTest extends TestCase
{
  public function testGetName()
  {
    $subject = new Person();
    $subject->name = 'John Doe';

    $this->assertEquals('John Doe', $subject->getName());
  }

  public function testGetEmailCard()
  {
    $subject = new Person();
    $subject->name = 'Jane Doe';
    $subject->email = 'jane.doe@example.com';

    $this->assertEquals(
      'Jane Doe <jane.doe@example.com>',
      $subject->getEmailCard()
    );
  }
}
