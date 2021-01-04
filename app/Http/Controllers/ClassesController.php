<?php

namespace App\Http\Controllers;

use \Illuminate\Http\Request;

/**
 * This class controls the /classes routes
 */
class ClassesController extends Controller
{
  public function list()
  {
    $classes = app('db')->select("SELECT * FROM Class");

    return view('classes.list', [
      'classes' => $classes,
    ]);
  }

  public function show($id)
  {
    $classes = app('db')->select("SELECT * FROM Class WHERE id = ?", [$id]);

    if (count($classes) > 0) {
      return view('classes.show', [
        'class' => $classes[0],
      ]);

    } else {
      return "404";
    }
  }

  public function store(Request $request)
  {
    app('db')->insert(
      "INSERT INTO Class (`ID`, `Name`, `Group`, `Ects`) VALUES (uuid(), ?, ?, ?)",
      array_values($request->all())
    );

    return redirect('/');
  }
}
