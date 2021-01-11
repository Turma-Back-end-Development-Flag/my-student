<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
  const CREATED_AT = 'Created_at';
  const UPDATED_AT = 'Modified_at';

  public $table = 'Person';
  public $guarded = [ 'ID' ];
}
