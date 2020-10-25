<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\ProductDiscount;
use Faker\Generator as Faker;

$factory->define(ProductDiscount::class, function (Faker $faker) {
    $product = factory(Product::class)->create();
    
    return [
        'product_id' => $product->id,
        'discount_price' => $product->price * 0.5
    ];
});
