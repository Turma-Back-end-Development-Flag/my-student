<?php

$router->group([
  'prefix' => 'api',
  'middleware' => 'auth',
], function() use ($router) {

  $router->group([
    'prefix' => 'v1'
  ], function() use ($router) {

    $router->group([
      'prefix' => 'people'
    ], function() use ($router) {


      $router->get('/', [
        'uses' => 'Api\PeopleController@list',
      ]);

    });
  });
});
