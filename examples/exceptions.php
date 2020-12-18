<?php

$colors = [
  "red", "green", "blue"
];

$cor = $argv[1];

try {
  echo "Vamos escolher uma cor\n";

  if (!in_array($cor, $colors)) {
    throw new Exception("A cor não existe");
  }

  echo "A cor existe\n";

} catch (Exception $e) {
  echo "Exception: " . $e->getMessage();
}
