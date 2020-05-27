<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Movie;
use App\Models\Review;
use App\User;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'movie_id' => Movie::pluck('id')->random(),
        'body' => $faker->text(100)
    ];
});
