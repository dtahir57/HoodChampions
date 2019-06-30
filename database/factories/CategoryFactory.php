<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Http\Models\Category;
use Faker\Generator as Faker;
use App\Http\Models\InterestGroup;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'image' => $faker->imageUrl($min = 150, $max = 150, null, false),
        'is_active' => $faker->boolean,
        'categoryable_id' => $faker->numberBetween($min = 1, $max = 10),
        'categoryable_type' => InterestGroup::class
    ];
});
