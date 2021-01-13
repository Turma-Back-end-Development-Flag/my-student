<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Initial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
          $table->uuid('uid')->primary();
          $table->integer('number')->unique();
          $table->string('name');
          $table->string('email');
          $table->date('birthdate')->nullable(true);
          $table->timestamps();
        });

        Schema::create('class', function (Blueprint $table) {
          $table->uuid('uid')->primary();
          $table->string('name');
          $table->string('group')->default('Sem Grupo');
          $table->uuid('previous_id')->unique()->nullable(true);
          $table->integer('ects');
          $table->timestamps();
        });

        DB::statement('ALTER TABLE people MODIFY number INT(9) UNIQUE NOT NULL AUTO_INCREMENT;');
        DB::statement('ALTER TABLE class ADD FOREIGN KEY(`previous_id`) REFERENCES class(`uid`)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('people');
        Schema::drop('class');
    }
}
