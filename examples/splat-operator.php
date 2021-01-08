<?php

function my_thing($first_category, ...$categories)
{
  var_dump($first_category, $categories);
}

my_thing(1, 2, 3, 4, 5);
my_thing(...[1, 2, 3, 4, 5]);

/*

int(1)
array(4) {
  [0]=>
  int(2)
  [1]=>
  int(3)
  [2]=>
  int(4)
  [3]=>
  int(5)
}

*/
