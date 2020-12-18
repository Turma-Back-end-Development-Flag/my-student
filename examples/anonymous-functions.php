<?php

function cube(int $n)
{
  return $n * $n * $n;
}

$result = array_map('cube', [1, 2, 3]);

var_dump($result);



$result = array_map(function (int $n) {
  return $n * $n * $n;
}, [1, 2, 3]);

var_dump($result);
