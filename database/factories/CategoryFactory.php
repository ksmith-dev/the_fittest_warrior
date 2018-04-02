<?php

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {

    $categories = array('men', 'women', 'kid', 'jewelery', 'footwear', 'underwear', 'sleepwear');

    return [
        'category_id' => rand(1,100),
        'category' => $categories[rand(0,5)],
    ];
});
