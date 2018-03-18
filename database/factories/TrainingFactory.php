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
        'user_id' => rand(1,10),
        'start_date_time' => $faker->date('m/d/Y H:i:s'),
        'end_date_time' => $faker->date('m/d/Y H:i:s'),
        'active_status' => 1,
        'training_type' => $training_types[rand(0,7)],
    ];
});
