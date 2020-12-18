<?php

function has_float(float $n) {
  var_dump($n);
}
function has_int (int $n) {
  var_dump($n);
}
function has_string (string $n) {
  var_dump($n);
}
function has_array (array $n) {
  var_dump($n);
}

has_float(0.5);
has_float(1);
has_float("12");
has_float("12a");

has_int(1.85);
has_string(1.34);
has_string( 2/3 );

var_dump("10" + 2);

has_array(["string"]);
