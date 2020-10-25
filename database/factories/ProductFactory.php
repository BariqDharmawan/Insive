<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'product_name' => $faker->unique(true)->randomElement([
            'Go Away Acne!',
            'Hydrate Me!',
            'Whitening is Coming!',
            'Korean Choc-choc!',
            'Japan’s Pitera!'
        ]),
        'price' => $faker->randomElement([19900, 20900, 39999]),
        'qty' => random_int(1, 99),
        'type' => $faker->randomElement(['a', 'b', 'c']),
        'category' => 'mask'
    ];
});
