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
      $table->date('dt_birth')->nullable();
      $table->unsignedInteger('gender_id');
      $table->unsignedInteger('marital_status_id')->nullable();
      $table->string('email')->unique();
      $table->string('phone', 20);
      $table->string('mobile', 20)->nullable();
      $table->string('password');
      $table->boolean('is_active')->default(false);
      $table->rememberToken();
      $table->timestamps();

      $table->foreign('gender_id')->references('id')->on('genders');
      $table->foreign('marital_status_id')->references('id')->on('marital_statuses');
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
