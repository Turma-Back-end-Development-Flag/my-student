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
    'title'   => 'My Student',
    'classes' => $classes,
  ]);

});

/**
 * Group for classes
 */
$router->group([
  'prefix' => 'classes'
], function () use ($router) {

  $router->get('/', [
    'uses' => 'ClassesController@list',
    'as' => 'list_classes'
  ]);

  $router->get('/new', [
    'as' => 'new_classe',
    function () {
      return view('classes.new');
    }
  ]);

  $router->post('/new', [
    'uses' => 'ClassesController@store',
    'as' => 'store_classe'
  ]);

  $router->get('/{id}', [
    'uses' => 'ClassesController@show',
    'as' => 'show_classe'
  ]);
});



$router->get('/people/', function () {

  $person = new App\Models\Person('123', "John Doe", 123);

  dd($person);
});
