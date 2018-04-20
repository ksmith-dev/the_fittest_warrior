<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(App\Workout::class, function (Faker $faker) {

    $types = array(
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

    $type = $types[rand(0, 12)];

    $training = DB::table('training')->where('workout_type', $type)->first();

    return [
        'user_id' => rand(1, 10),
        'training_type' => $training->type,
        'activity_type' => null,
        'type' => $type,
        'repetitions' => rand(1,100),
        'sets' => rand(1,10),
        'weight' => rand(1, 300),
        'weight_unit' => "LBS",
        'resistance_factor' => 1,
        'calories_burned' => rand(1,3000),
        'duration' => rand(10, 60) . ":" . rand(10,60) . ":" . rand(10,60),
        'rest' => rand(10, 60) . ":" . rand(10,60) . ":" . rand(10,60)
    ];
});
