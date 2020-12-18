<?php

function pure_function (int $i) {
  return 2 * $i;
}

for ($i = 0; $i < 10; $i++) {
  //var_dump(pure_function(2));
}




function first_last_to_name (string $first, string $last) {
  return "$first $last";
}

$people = [
  [
    'first' => 'Vitor',
    'last'  => 'Carvalho',
  ],
  [
    'first' => 'John',
    'last'  => 'Doe',
  ]
];

// Os dois exemplos seguintes são idênticos

// 1: usando array_map
$result = array_map(function (array $person) {
  return first_last_to_name($person['first'], $person['last']);
}, $people);

var_dump($result);

// 2: usando foreach
$result = [];
foreach ($people as $person) {
  $result[] = first_last_to_name($person['first'], $person['last']);
}
var_dump($result);



$j = 0;
function impure_function () {
  global $j;
  $j = 1;
}

impure_function();

var_dump($j);
