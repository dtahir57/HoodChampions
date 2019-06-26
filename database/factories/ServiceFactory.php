<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Http\Models\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'description' => $faker->paragraph,
        'price' => $faker->randomDigitNotNull,
        'email' => $faker->safeEmail,
        'contact_no' => $faker->phoneNumber,
        'image' => $faker->imageUrl($width = 200, $height = 200),
        'hood_id' => $faker->numberBetween($min = 1, $max = 10)
    ];
});
