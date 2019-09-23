<?php

use Faker\Generator as Faker;

$factory->define(App\Answer::class, function (Faker $faker) {
    return [
      'fullname' => $faker->name,
      'gender' => $faker->numberBetween($min = 1, $max = 2),
      'age_id' => $faker->numberBetween($min = 1, $max = 6),
      'email' => $faker->email,
      'is_send_email' => $faker->numberBetween($min = 0, $max = 1),
      'feedback' => $faker->realText($maxNbChars = 200, $indexSize = 1),
      'created_at'  => $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
    ];
});
