<?php

namespace App\Interactors;

use Illuminate\Support\Facades\Mail;

class SendEmailWhenPersonIsUpdatedOrCreated
{
  static function call(string $name, string $email, string $action)
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
}
