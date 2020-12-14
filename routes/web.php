<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () {

  $classes = app('db')->select("SELECT * FROM Class");

  return view('index', [
    'classes' => $classes
  ]);

});

$router->get('/classes/{id}', function ($id) {
  $classes = app('db')->select("SELECT * FROM Class WHERE id = ?", [$id]);

  if (count($classes) > 0) {
    return view('class', [
      'class' => $classes[0]
    ]);

  } else {
    return "404";
  }

});
