<?php

use App\Health;
use Faker\Generator as Faker;

$factory->define(Health::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'ldl_cholesterol' => mt_rand(1, 20),
        'fat_percentage' => mt_rand(1, 20),
        'systolic_blood_pressure' => mt_rand(1, 20),
        'diastolic_blood_pressure' => mt_rand(1, 20),
        'hdl_cholesterol' => '',
        'start_date_time' => $faker->dateTimeThisMonth(),
        'end_date_time' => $faker->dateTimeThisMonth()
    ];
});