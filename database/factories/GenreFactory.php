<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Genre;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Genre::class, function (Faker $faker) {
    $genre = $faker->word;
    return [
        'body' => $genre,
        'slug' => STR::slug($genre)
    ];
});
