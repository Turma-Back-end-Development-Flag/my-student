<?php

abstract class OrmModel
{
  public $table;
  public function find($id)
  {
    return DB::select('SELECT * FROM $this->table WHERE id = ?', [$id]);
  }
}

class Person extends OrmModel
{
  public $table = "person";
}

(new Person())->find('123');
