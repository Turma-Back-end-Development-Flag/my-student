<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFilestorePeopleTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('people', function (Blueprint $table) {
      $table->foreignId('filestore_id')
        ->nullable()
        ->constrained('filestore');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('people', function (Blueprint $table) {
      $table->dropForeign('filestore_id');
      $table->dropColumn('filestore_id');
    });
  }
}
