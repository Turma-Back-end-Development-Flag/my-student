<?php

$lista = [1, 2, 3, 4];

foreach ( $lista as $item ) {
  echo "$item\n";
}

$chave_valor = [
  'foo' => 'bar',
  'john' => 'doe',
];

foreach ( $chave_valor as $chave => $valor ) {
  echo "$chave: $valor\n";
}
