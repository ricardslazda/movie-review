<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Movie;
use Faker\Generator as Faker;
use GuzzleHttp\Client;

$autoIncrement = autoIncrement();

$factory->define(Movie::class, function (Faker $faker) use ($autoIncrement) {
    $client = new Client();
    $response = $client->request('GET', 'https://api.themoviedb.org/3/tv/popular?api_key=99880aa5851439f69dc4da9e68f79d59&language=en-US&page=1');
    $body = json_decode($response->getBody()->getContents())->results;
    $current = $body[$autoIncrement->current()];
    $autoIncrement->next();
    return [
        'name' => $current->name,
        'overview' => $current->overview,
        'first_air_date' => $current->first_air_date,
        'poster_path' => $current->poster_path,
        'genre_id' => '1'
    ];
});

function autoIncrement()
{
    for ($i = 0; $i < 1000; $i++) {
        yield $i;
    }
}
