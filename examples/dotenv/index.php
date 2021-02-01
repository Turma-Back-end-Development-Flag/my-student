<?php

include 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

echo $_SERVER['MY_AWESOME_VARIABLE'];

