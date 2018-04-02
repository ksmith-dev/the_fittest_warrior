<?php

use App\Attribute;
use Faker\Generator as Faker;

$factory->define(Attribute::class, function (Faker $faker) {

    $attributes = array('casual', 'formal', 'dress', 'winter', 'summer', 'spring', 'accessory');

    return [
        'attribute_id' => rand(1,100),
        'attribute' => $attributes[rand(0,6)],
    ];
});
