<?php

for ($i = 0; $i <= 10; $i++) {
  echo "\nVerdadeiro " . $i . ($i == 1 ? " vez" : " vezes");
}

for ($i = 0;; $i++) {
  if ($i > 10) {
    break;
  }
  echo "\nVerdadeiro " . $i . ($i == 1 ? " vez" : " vezes");
}

