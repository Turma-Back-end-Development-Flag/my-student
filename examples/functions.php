<?php

$abc = [1, 2];

function identidade($args)
{
  $foo = "bar";

  if ($foo === "baz") {
    return false;
  }

  var_dump($foo);
  return $args;
}

function wait($seconds)
{
  sleep($seconds);
}

function wait2s()
{
  sleep(2);
}

wait2s();

var_dump($foo);

$result = identidade($abc);
$abc[] = 3;

var_dump($result, $abc);
