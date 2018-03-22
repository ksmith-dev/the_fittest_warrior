<?php

use Faker\Generator as Faker;

$factory->define(App\WorkoutReport::class, function (Faker $faker) {

    $muscle_groups = array(
        'NECK',
        'TRAPS',
        'SHOULDERS',
        'CHEST',
        'BICEPS',
        'FOREARMS',
        'ABS',
        'QUADRICEPS',
        'CALVES',
        'GLUTES',
        'HAMSTRINGS',
        'LOWER BACK',
        'TRICEPS',
        'UPPER BACK',
        'TRAPS'
    );

    return [
        'workout_id' => rand(1,200),
        'repetitions' => rand(1,10),
        'sets' => rand(1,100),
        'weight' => rand(1, 400),
        'weight_units' => "LBS",
        'resistance_factor' => 1,
        'calories_burned' => rand(1,3000),
        'duration' => rand(10, 99) . ":" . rand(10,99) . ":" . rand(10,99),
        'rest' => rand(10, 99) . ":" . rand(10,99) . ":" . rand(10,99),
        'muscle_groups' => $muscle_groups[rand(0,14)] . ', ' . $muscle_groups[rand(0,14)] . ', ' . $muscle_groups[rand(0,14)],
    ];
});
