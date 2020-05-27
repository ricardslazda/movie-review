<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Movie;
use App\Models\StarRating;
use App\User;
use Faker\Generator as Faker;

$factory->define(StarRating::class, function (Faker $faker) {
    return [
        'user_id' => User::pluck('id')->random(),
        'movie_id' => Movie::pluck('id')->random(),
        'star_count' => rand(1, 10)
    ];
});
