<?php

$url = "./example.txt";

for (;;) {
  if ( false !== @file_get_contents( $url ) ) {
    break;
  }
  echo "Waiting 1 second to get file\n";
  sleep(1);
}
