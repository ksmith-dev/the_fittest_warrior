<?php

use Faker\Generator as Faker;

$factory->define(App\Workout::class, function (Faker $faker) {

    $workout_types = array(
        "inch_worm",
        "tuck_jump",
        "bear_crawl",
        "mountain_climber",
        "push_up",
        "stair_climb",
        "burpees",
        "plank",
        "lunge",
        "squat",
        "dead_lift",
        "side_plank",
        "crunch"
    );

    return [
        'session_id' => rand(1,100),
        'start_date_time' => $faker->date('m/d/Y H:i:s'),
        'end_date_time' => $faker->date('m/d/Y H:i:s'),
        'workout_type' => $workout_types[rand(0,12)],
    ];
});
