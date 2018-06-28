<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    DB::table('users')->insert([
      'name' => 'Daniela Tobon',
      'dt_birth' => Carbon::now(),
      'gender_id' => \App\Gender::all()->random()->id,
      'email' => 'test@gmail.com',
      'phone' => '3810025',
      'password' => bcrypt('secret')
    ]);


    DB::table('users')->insert(
      [
        [
          'name' => 'Alexander Lopez',
          'dt_birth' => Carbon::now(),
          'gender_id' => \App\Gender::all()->random()->id,
          'email' => 'alex@gmail.com',
          'phone' => '3818225',
          'password' => bcrypt('secret')
        ],
        [
          'name' => 'Carlos Ortiz',
          'dt_birth' => Carbon::now(),
          'gender_id' => \App\Gender::all()->random()->id,
          'email' => 'ortis@hotmail.com',
          'phone' => '3028525',
          'password' => bcrypt('secret')
        ]
      ]
    );

  }
}
