<?php

use App\MaritalStatus;
use Illuminate\Database\Seeder;

class MaritalStatusesTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $marital_statuses = [
      [
        'id' => '1',
        'name' => 'Soltero/a'
      ],
      [
        'id' => '2',
        'name' => 'Comprometido/a'
      ],
      [
        'id' => '3',
        'name' => 'Casado/a'
      ],
      [
        'id' => '4',
        'name' => 'Divorciado/a'
      ],
      [
        'id' => '5',
        'name' => 'Viudo/a'
      ]
    ];

    foreach ($marital_statuses as $marital_status) {
      MaritalStatus::create($marital_status);
    }
  }
}
