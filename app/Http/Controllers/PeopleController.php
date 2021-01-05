<?php

namespace App\Http\Controllers;

class PeopleController extends Controller
{
  public function list()
  {
    return view('people.list');
  }
}
