<?php

class FooBar
{
  // Factory method
  static function create(string $name)
  {
    $entity = new FooBar($name);
    $entity->setName($name);

    return $entity;
  }

  private $name;

  public function setName(string $aname)
  {
    $this->name = $aname;
  }

  public function getName()
  {
    return $this->name;
  }
}

function foobar_create(string $name)
{
  $entity = new FooBar();
  $entity->name = $name;

  return $entity;
}

$fb = new FooBar();
$fb->setName('John');
echo $fb->getName();

$fb2 = FooBar::create('John');
echo $fb2->getName();

$fb3 = foobar_create('John');
echo $fb3->getName();
