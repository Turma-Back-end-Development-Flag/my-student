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

  private function storeEmailMessage()
  {
    return <<<EOL
    Hello ${input['Name']},

    This email is to inform you about your new registration.

    Kind regards,
    @The Team
    EOL;
  }

  // Model
  private function insertPersonInDb($name, $email)
  {
    app('db')->insert(
      'INSERT INTO Person (`ID`, `Name`, `Email`) VALUES(uuid(), ?, ?)',
      [$name, $email]
    );
  }

  // Model
  private function sendEmailWhenPersonIsCreated($email)
  {
    $message = $this->storeEmailMessage();
    mail($email, 'New registration', $message);
  }

  // Interactor (Model)
  private function storePerson($input)
  {
    $this->insertPersonInDb(...$input);
    $this->sendEmailWhenPersonIsCreated($input['Email']);
  }

  // Controller
  public function store(Request $request)
  {
    // tratamento de dados de utilizador
    $input = $request->all();
    // invoca lógica de negócio
    $this->storePerson($input);
    // retornar view (lógica de apresentação)
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
