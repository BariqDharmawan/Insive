<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Faq;
use Faker\Generator as Faker;

$factory->define(Faq::class, function (Faker $faker) {
    return [
        'pertanyaan' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'isi' => $faker->realText($maxNbChars = 200, $indexSize = 2)
    ];
});
