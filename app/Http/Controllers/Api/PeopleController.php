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

    $query = Person::query();

    $total = $query->count();
    $skip = ($page * $per_page) - $per_page;

    $result = $query->skip($skip)->take($per_page)->get();

    // $total: 11
    // $per_page: 5
    // $page: 3
    // $skip = 10
    // $skip + $per_page = 15 = $page * $per_page - $per_page + $per_page

    $links = [
      'self' => "/api/v1/people?page=$page",
    ];

    if ($page > 1) {
      $links['previous'] = "/api/v1/people?page=".($page-1);
    }

    if ($page * $per_page < $total) {
      $links['next'] = "/api/v1/people?page=".($page+1);
    }

    return response()
      ->json([
        '_links' => $links,
        '_embedded' => [
          'people' => $result
        ]
      ])
      ->header('Content-Type', 'application/hal+json');
  }
}
