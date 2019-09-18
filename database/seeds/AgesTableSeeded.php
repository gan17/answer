<?php

use Illuminate\Database\Seeder;

class AgesTableSeeded extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('ages')->insert([
        [
          'age' => '10代以下',
          'sort' => '1',
        ],
        [
          'age' => '20代',
          'sort' => '2',
        ],
        [
          'age' => '30代',
          'sort' => '3',
        ],
        [
          'age' => '40代',
          'sort' => '4',
        ],
        [
          'age' => '50代',
          'sort' => '5',
        ],
        [
          'age' => '60代以上',
          'sort' => '6',
        ],
      ]);
    }
}
