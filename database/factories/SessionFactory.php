<?php

use Faker\Generator as Faker;

$factory->define(App\Session::class, function (Faker $faker) {

    $session_types = array(
        "WALKING",
        "RUNNING",
        "SWIMMING",
        "AQUAROBICS",
        "CYCLING",
        "ROWING",
        "BOXING",
        "DANCING",
        "HIKING"
    );

    return [
        'training_id' => rand(1,11),
        'start_date_time' => $faker->dateTimeThisDecade(),
        'end_date_time' => $faker->dateTimeThisDecade(),
        'session_type' => $session_types[rand(0,8)],
    ];
});
