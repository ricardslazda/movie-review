<?php

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $client = new Client();
    $response = $client->request('GET', 'https://api.themoviedb.org/3/tv/popular?api_key=99880aa5851439f69dc4da9e68f79d59&language=en-US&page=1');
    $statusCode = $response->getStatusCode();
    $body = json_decode($response->getBody()->getContents())->results;
    dd($body);
    foreach ($body as $movie) {
        $url = 'http://image.tmdb.org/t/p/w1000_and_h563_face' . $movie->poster_path;
    }
});
