<?php

use App\Book;
use Faker\Generator as Faker;

/**
* Book
*
*/
$factory->define(Book::class, function (Faker $faker) {
  return [
    'title' => $faker->name,
    'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    'pages' => $faker->numberBetween($min = 100, $max = 2000),
    'date_of_publication' => $faker->date($format = 'Y-m-d', $max = 'now')
  ];
});
