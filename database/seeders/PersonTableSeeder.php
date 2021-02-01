<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PersonTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Person::create([
      'ID'    => Str::uuid(),
      'Name'  => 'John Doe',
      'Email' => 'john.doe@example.com',
    ]);
  }
}
