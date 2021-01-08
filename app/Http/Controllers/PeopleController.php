<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PeopleController extends Controller
{
  public function list()
  {
    $result = app('db')->select('SELECT * FROM Person');

    return view('people.list', [
      'people' => $result,
    ]);
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
  private function sendEmailWhenPersonIsCreated($name, $email)
  {
    $this->sendEmailWhenPersonIsUpdatedOrCreated($name, $email, "created");
  }

  private function sendEmailWhenPersonIsUpdatedOrCreated($name, $email, $action)
  {
    $action === 'created'
      ? 'New registration'
      : 'Updated registration';

    Mail::send('people.emails.create', [
      'name' => $name,

    ], function ($mail) use ($email, $action) {
      $mail
        ->to($email)
        ->subject($action);
    });
  }

  // Interactor (Model)
  private function storePerson($input)
  {
    $this->insertPersonInDb(...array_values($input));
    $this->sendEmailWhenPersonIsCreated(...array_values($input));
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
