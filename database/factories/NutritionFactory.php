<?php

use Faker\Generator as Faker;

$factory->define(App\Nutrition::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 10),
        'portion_size' => rand(0,10),
        'gram_protein' => rand(1,1),
        'gram_fat' => rand(1,5),
        'gram_saturated_fat' => rand(1,5),
        'cholesterol' => rand(1,5),
        'carbohydrates' => rand(1,50),
        'sugars' => rand(1, 10),
        'sodium' => rand(1,5),
        'fiber' => rand(1,7),
        'calories' => rand(1, 5000),
        'start_date_time' => $faker->date('m/d/Y H:i:s'),
        'end_date_time' => $faker->date('m/d/Y H:i:s'),
    ];
});
