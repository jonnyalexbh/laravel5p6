<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaritalStatusesTable extends Migration
{
  /**
  * Run the migrations.
  *
  * @return void
  */
  public function up()
  {
    Schema::create('marital_statuses', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name', 62);
      $table->timestamp('date_created')->nullable();
      $table->timestamp('date_modified')->nullable();
    });
  }

  /**
  * Reverse the migrations.
  *
  * @return void
  */
  public function down()
  {
    Schema::dropIfExists('marital_statuses');
  }
}
