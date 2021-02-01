<?php

namespace App\Http\Controllers\Api;

use App\Models\Person;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class PeopleController extends Controller
{
  public function list(Request $request)
  {
    $per_page = (int) $request->query('per_page', 5);
    $page = (int) $request->query('page', 1);

    $result = Person::all();

    return response()
      ->json([
        '_links' => [
          'self' => '/api/v1/people'
        ],
        '_embedded' => [
          'people' => $result
        ]
      ])
      ->header('Content-Type', 'application/hal+json');
  }
}
