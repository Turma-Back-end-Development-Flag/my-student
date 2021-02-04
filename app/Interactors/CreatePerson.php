<?php

namespace App\Interactors;

use App\Models\Filestore;
use App\Models\Person;
use Illuminate\Http\UploadedFile;

class CreatePerson
{
  static function call(string $name, string $email, UploadedFile $avatar = null)
  {
    if ($avatar) {
      $avatar = Filestore::store($avatar);
    }

    $person = Person::create($name, $email, $avatar);
    // Send event PersonCreated
    SendEmailWhenPersonIsUpdatedOrCreated::call($name, $email, "created");

    return $person;
  }
}
