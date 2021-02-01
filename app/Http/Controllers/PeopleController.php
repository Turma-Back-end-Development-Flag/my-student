<?php

namespace App\Http\Controllers;

use App\Exceptions\ShowIdNotFoundException;
use App\Interactors\CreatePerson;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PeopleController extends Controller
{
  public function list()
  {
    // $result = app('db')->select('SELECT * FROM Person');
    $result = Person::with('avatar')->all();

    return view('people.list', [
      'people' => $result,
    ]);
  }

  // Controller
  public function store(Request $request)
  {
    // validations
    $validation = Validator::make($request->all(), [
      'name' => 'required|min:2|max:255',
      'email' => 'required|unique:people,email|email|min:6|max:255',
      'nif' => 'required|min:9|max:9|regex:/^[0,1,2,5,9][\d]+/'
    ], [
      'email.min' => 'Deverá ter mais de 6 caracteres.',
    ]);

    if ($validation->fails()) {
      return view('people.new', [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'nif' => $request->input('nif'),
        'error' => $validation->errors()->first(),
      ]);
    }

    // invoca lógica de negócio
    $person = CreatePerson::call(
      $request->input('name'),
      $request->input('email'),
      $request->file('avatar'),
    );

    // retornar view (lógica de apresentação)
    return redirect('/people/' . $person->uid);
  }

  public function show($id)
  {
    //$result = app('db')->select('SELECT * FROM Person WHERE id = ?', [$id]);
    $result = Person::where('uid', $id)->first();

    if ($result) {
      return view('people.show', [
        'person' => $result
      ]);

    } else {
      throw new ShowIdNotFoundException("Person");
    }
  }
}
