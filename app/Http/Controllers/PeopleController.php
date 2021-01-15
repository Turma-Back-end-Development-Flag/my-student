<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PeopleController extends Controller
{
  public function list()
  {
    // $result = app('db')->select('SELECT * FROM Person');
    $result = Person::all();

    return view('people.list', [
      'people' => $result,
    ]);
  }

  // Model
  private function insertPersonInDb($name, $email, $avatar)
  {
    $person = new Person();

    $person->uid = Str::uuid();
    $person->name = $name;
    $person->email = $email;
    $person->avatar_filename = $avatar;

    $person->save();

    return $person;

    // app('db')->insert(
    //   'INSERT INTO Person (`uid`, `name`, `email`, `avatar_filename`) VALUES(uuid(), ?, ?, ?)',
    //   [$name, $email, $avatar]
    // );
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
    // validations
    $validation = Validator::make($request->all(), [
      'name' => 'required|min:2|max:255',
      'email' => 'required|unique:people,email|email|min:6|max:255',
      'nif' => 'required|min:9|max:9|regex:/^[0,1,2,5,9][\d]+/'
    ], [
      'email.min' => 'Deverá ter mais e 6 caracteres.',
    ]);

    if ($validation->fails()) {
      return view('people.new', [
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'nif' => $request->input('nif'),
        'error' => $validation->errors()->first(),
      ]);
    }

    // file upload
    $avatar = $request->file('avatar');

    if ($avatar) {
      $dirname = base_path('public/uploads');
      $filename = Str::uuid();
      $extension = $avatar->getClientOriginalExtension();
      $avatar = $avatar->move($dirname, "$filename.$extension");
    }

    // tratamento de dados de utilizador
    $input = $request->all();

    // invoca lógica de negócio
    $this->storePerson([
      'name' => $input['name'],
      'email' => $input['email'],
      'avatar' => $avatar ? $avatar->getFilename() : null,
    ]);


    // retornar view (lógica de apresentação)
    return redirect('/people');
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
      return "404";
    }
  }
}
