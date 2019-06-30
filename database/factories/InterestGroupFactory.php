<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Http\Models\InterestGroup;
use Faker\Generator as Faker;

$factory->define(InterestGroup::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->sentence(5),
        'about_us' => $faker->sentence(2),
        'email' => $faker->safeEmail,
        'contact_no' => $faker->phoneNumber,
        'meetup_place' => $faker->sentence(3),
        'photo' => $faker->imageUrl($min = 150, $max = 150, null, false)
    ];
});
