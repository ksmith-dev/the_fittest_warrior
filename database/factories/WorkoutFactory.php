<?php

use Faker\Generator as Faker;

$factory->define(App\Workout::class, function (Faker $faker) {

    $workout_types = array(
        "INCH_WORM",
        "TUCK_JUMP",
        "BEAR_CRAWL",
        "MOUNTAIN_CLIMBER",
        "PUSH_UP",
        "STAIR_CLIMB",
        "BURPEES",
        "PLANK",
        "LUNGE",
        "SQUAT",
        "DEAD_LIFT",
        "SIDE_PLANK",
        "CRUNCH"
    );

    return [
        'session_id' => rand(1,100),
        'start_date_time' => $faker->dateTimeThisDecade(),
        'end_date_time' => $faker->dateTimeThisDecade(),
        'workout_type' => $workout_types[rand(0,12)],
    ];
});
