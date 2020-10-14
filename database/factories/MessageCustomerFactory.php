<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Models\ContactUs;
use Faker\Generator as Faker;

$factory->define(ContactUs::class, function (Faker $faker) {
    return [
        'email_customer' => User::inRandomOrder()->first()->email, 
        'nama_customer' => User::inRandomOrder()->first()->name,
        'pesan' => $faker->realText($maxNbChars = 200, $indexSize = 2)
    ];
});
