<?php

use App\Models\Person;

class PeopleIntegrationTest extends TestCase
{
  public function testListPeople()
  {
    $response = $this->call('GET', '/people');

    $this->assertEquals(200, $response->status());
    $this->assertStringContainsString(
      '<h4>People</h4>', $response->content()
    );
  }

  public function testCreatePerson()
  {
    $person = Person::factory()->make();

    $response = $this->call('POST', '/people/new', [
      'name' => $person->name,
      'email' => $person->email,
    ]);

    $this->seeInDatabase('people', [
      'email' => $person->email,
    ]);

    $this->assertEquals(302, $response->status());
  }
}
