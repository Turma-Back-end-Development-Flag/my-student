<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePeople extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('Person', function (Blueprint $table) {
      $table->addColumn('string', 'NationalId', [
        'length' => 255,
      ])
      ->nullable(true)
      ->after('Name');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('Person', function (Blueprint $table) {
      $table->dropColumn('NationalId');
    });
  }
}
