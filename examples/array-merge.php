<?php

$result = array_merge([1, 2, 3], [4, 5, 6]);

var_dump($result);

$array_a = [1, 2];
$array_b = array_merge($array_a);
$array_a[] = 3;

var_dump($array_a, $array_b);
