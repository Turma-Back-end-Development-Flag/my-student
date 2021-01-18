<?php

function router(callable $callee) {
  if ($_SERVER['HTTP_METHOD'] === "post") {
    $callee($_POST);
  } else {
    $callee($_GET);
  }
};
