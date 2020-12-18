<?php

$numbers = [1, 2, 3, 4, 5];

$result = array_map(function ($n) {
  return $n * $n;

}, $numbers);

var_dump($result);

$doubled_numbers = [];
foreach ( $numbers as $value ) {
  $doubled_numbers[] = $value * $value; // Inserir o $value no array
}

var_dump($doubled_numbers);

