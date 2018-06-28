<?php

use App\Gender;
use Illuminate\Database\Seeder;

class GendersTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $genders = [
      [
        'id' => '1',
        'name' => 'Hombre'
      ],
      [
        'id' => '2',
        'name' => 'Mujer'
      ]
    ];

    foreach ($genders as $gender) {
      Gender::create($gender);
    }

  }
}
