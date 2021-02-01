<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\File\File;

class Filestore extends Model
{
  protected $table = 'filestore';

  static function store(UploadedFile $file)
  {
    $dirname = base_path('public/uploads');
    $filename = Str::uuid();
    $extension = $file->getClientOriginalExtension();

    return self::create(
      $file->move($dirname, "$filename.$extension")
    );
  }

  static function create(File $file)
  {
    $entity = new self();
    $entity->filename = $file->getFilename();
    $entity->mimetype = $file->getMimeType();
    $entity->save();

    return $entity;
  }

  public function getPerson()
  {
    return $this->hasOne(Person::class);
  }

  public function getFilename()
  {
    return $this->filename;
  }
}
