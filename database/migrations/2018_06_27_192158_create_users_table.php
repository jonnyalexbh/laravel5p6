<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->date('dt_birth');
      $table->unsignedInteger('gender_id');
      $table->string('email')->unique();
      $table->string('phone', 20);
      $table->string('mobile', 20)->nullable();
      $table->string('password');
      $table->boolean('is_active')->default(false);
      $table->rememberToken();
      $table->timestamps();

      $table->foreign('gender_id')->references('id')->on('genders');
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('users');
  }
}
