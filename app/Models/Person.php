<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Person extends Model
{
  use HasFactory;

  public $primaryKey = 'uid';

  public $guarded = [];

  protected static function boot()
  {
    parent::boot();

    static::creating(function ($post) {
      $post->{$post->getKeyName()} = (string) Str::uuid();
    });
  }

  public function getIncrementing()
  {
    return false;
  }

  public function getKeyType()
  {
    return 'string';
  }

  static function create(string $name, string $email, Filestore $avatar = null)
  {
    $person = new self();

    // "Martelada" para resolver um bug!
    $person->uid = Str::uuid();
    $person->name = $name;
    $person->email = $email;
    //$person->save();

    if ($avatar) {
      $avatar->getPerson()->save($person);
    }

    return $person;
  }

  public function avatar()
  {
    return $this->belongsTo(Filestore::class, 'filestore_id', 'id');
  }

  public function getName()
  {
    return $this->name;
  }

  public function getEmailCard()
  {
    // John Doe <john.doe@example.org>
    return "$this->name <$this->email>";
  }
}
