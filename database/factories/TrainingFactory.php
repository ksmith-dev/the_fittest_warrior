<?php

use Faker\Generator as Faker;

$factory->define(App\Training::class, function (Faker $faker) {

    $training_types = array(
        "AEROBIC",
        "STRENGTH",
        "INTENSITY",
        "INTERVAL",
        "FLEXIBILITY",
        "CIRCUIT",
        "FARTLEK",
        "BALANCE"
    );

    return [
        'user_id' => rand(1,11),
        'start_date_time' => $faker->dateTimeThisDecade(),
        'end_date_time' => $faker->dateTimeThisDecade(),
        'active_status' => 1,
        'training_type' => $training_types[rand(0,7)],
    ];
});
