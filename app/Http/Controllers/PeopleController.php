<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeopleController extends Controller
{
  public function list()
  {
    $result = app('db')->select('SELECT * FROM Person');

    return view('people.list', [
      'people' => $result,
    ]);
  }

  public function store(Request $request)
  {
    $input = $request->all();

    app('db')->insert(
      'INSERT INTO Person (`ID`, `Name`, `Email`) VALUES(uuid(), ?, ?)',
      array_values( $input )
    );

    $message = <<<EOL
    Hello ${input['Name']},

    This email is to inform you about your new registration.

    Kind regards,
    @The Team
    EOL;

    mail($input['Email'], 'New registration', $message);

    return redirect('/people');
  }

  public function show($id)
  {
    $result = app('db')->select('SELECT * FROM Person WHERE id = ?', [$id]);

    if (count($result) > 0) {
      return view('people.show', [
        'person' => $result[0]
      ]);

    } else {
      return "404";
    }
  }
}
