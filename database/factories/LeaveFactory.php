<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Leave;
$factory->define(Leave::class, function (Faker $faker) {

    // TODO enhance status to be boolean
    // TODO enhance type to be boolean if that will be the final version

    $employee=factory('App\User')->create(['type' => 1]);

    return [
        'to_date' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now'),
        'from_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'type' => $faker->numberBetween(1, 2), // 1 for casual and 2 for planned
        'status	' => $faker->numberBetween(0, 1), // 0 for does not accept and 1 for accept
        'reason' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'user_id' => $employee->id,
        'assigned_id' => $employee->user_id,
    ];
});
