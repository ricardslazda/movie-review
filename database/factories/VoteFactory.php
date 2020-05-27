<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Review;
use App\Models\Vote;
use App\User;
use Faker\Generator as Faker;

$factory->define(Vote::class, function (Faker $faker) {
    return [
        'user_id' => User::pluck('id')->random(),
        'review_id' => Review::pluck('id')->random(),
        'vote' => rand(0,1)
    ];
});
