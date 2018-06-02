<?php

use App\Badge;
use Faker\Generator as Faker;

$factory->define(Badge::class, function (Faker $faker) {

    $_index = rand(0, 3);

    $alts = array('certified', 'training', 'practicing', 'seasoned');

    $badges = array(
        array(
            'name' => 'Achievement',
            'src' => 'images/icons/orange_badge.png',
            'alt' => $alts[$_index]
        ),
        array(
            'name' => 'Novice',
            'src' => 'images/icons/green_badge.png',
            'alt' => $alts[$_index]
        ),
        array(
            'name' => 'Advanced',
            'src' => 'images/icons/blue_badge.png',
            'alt' => $alts[$_index]
        ),
        array(
            'name' => 'Master',
            'src' => 'images/icons/purple_badge.png',
            'alt' => $alts[$_index]
        )
    );

    return [
        'name' => $badges[$_index]['name'],
        'user_id' => rand(1, 10),
        'status' => 'active',
        'img_src' => $badges[$_index]['src'],
        'img_alt' => $badges[$_index]['alt']
    ];
});
