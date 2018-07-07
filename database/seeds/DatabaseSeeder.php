<?php

use App\Book;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
  * Seed the application's database.
  *
  * @return void
  */
  public function run()
  {
    $numberOfBooks = 60;
    factory(Book::class, $numberOfBooks)->create();

    $this->call(CategoriesTableSeeder::class);
    $this->call(GendersTableSeeder::class);
    $this->call(MaritalStatusesTableSeeder::class);
    $this->call(UsersTableSeeder::class);
  }
}
