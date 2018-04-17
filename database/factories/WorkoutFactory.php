<?php

use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

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

    $workout_type = $workout_types[rand(0, 12)];

    $training_type = DB::table('training_type')->where('workout_type', $workout_type)->first();

    return [
        'user_id' => rand(1, 10),
        'training_type' => $training_type->training_type,
        'activity_type' => null,
        'workout_type' => $workout_type,
        'repetitions' => rand(1,100),
        'sets' => rand(1,10),
        'weight' => rand(1, 300),
        'weight_units' => "LBS",
        'resistance_factor' => 1,
        'calories_burned' => rand(1,3000),
        'duration' => rand(10, 60) . ":" . rand(10,60) . ":" . rand(10,60),
        'rest' => rand(10, 60) . ":" . rand(10,60) . ":" . rand(10,60)
    ];
});
