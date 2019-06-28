<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Http\Models\Team;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {
    return [
        'hood_id' => $faker->numberBetween($min = 1, $max = 10),
        'title' => $faker->sentence(2),
        'max_no_of_players' => $faker->randomDigitNotNull,
        'description' => $faker->text,
        'about_us' => $faker->sentence(7),
        'email' => $faker->safeEmail,
        'contact_no' => $faker->phoneNumber,
        'meetup_place' => $faker->postcode,
        'image' => $faker->imageURL($min = 150, $max = 150, null, false)
    ];
});
