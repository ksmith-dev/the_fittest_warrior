<?php

use App\SocialFeed;
use Faker\Generator as Faker;

$factory->define(SocialFeed::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'type' => $faker->mimeType(),
        'share_date' => $faker->dateTimeThisMonth(),
        'comment' => $faker->text(),
        'image_url' => 'http://via.placeholder.com/' . rand(50, 400) . 'x' . rand(50, 100)
    ];
});