<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $categories = [
      [
        'name' => 'Science fiction'
      ],
      [
        'name' => 'Drama'
      ],
      [
        'name' => 'Action and Adventure'
      ],
      [
        'name' => 'Romance'
      ],
      [
        'name' => 'Mystery'
      ]
    ];

    foreach ($categories as $category) {
      Category::create($category);
    }
  }
}
