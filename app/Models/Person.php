<?php

namespace App\Models;

class Person {

  public $ID;
  public $Name;
  public $Number;

  public function __construct(string $ID, string $Name, int $Number)
  {
    $this->ID = $ID;
    $this->Name = $Name;
    $this->Number = $Number;
  }
}
