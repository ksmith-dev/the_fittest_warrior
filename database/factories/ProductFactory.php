<?php

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {

    $size = array('XXL', 'XL', 'L', 'M', 'S', 'XS');
    $material = array('cotton', 'rayon', 'polyester', 'spandex');
    $max_sale = array('5', '10', '15', '20', '25', '30', '35');
    $name = array('t-shirt', 'pants', 'shirts', 'jackets', 'shoes');
    $type = array('casual', 'formal', 'dress', 'winter', 'summer', 'spring', 'accessory');

    return [
        'attribute_id' => rand(1,10),
        'sku' => $faker->uuid(),
        'gtin' => $faker->uuid(),
        'gtin_version' => 12,
        'category_id' => rand(1,50),
        'type' => $type[rand(0,6)],
        'name' => $name[rand(0,4)],
        'description' => $faker->text(20),
        'price' => mt_rand(111.11, 999.99),
        'currency' => 'USD',
        'stock' => rand(1,2000),
        'size' => $size[rand(0,5)],
        'color' => $faker->colorName,
        'material' => $material[rand(0,3)],
        'max_sale' => $max_sale[rand(0,6)],
        'image_url' => $faker->url(),
    ];
});