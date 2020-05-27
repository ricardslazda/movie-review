<?php

use App\Models\Genre;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pageCount = 1;

        $client = new Client();
        for ($i=1; $i <= $pageCount; $i++) {
            $api = 'https://api.themoviedb.org/3/tv/popular?api_key=99880aa5851439f69dc4da9e68f79d59&language=en-US&page=' . $i;
            $response = $client->request('GET', $api);
            $movies = json_decode($response->getBody()->getContents())->results;
            foreach ($movies as $movie) {
                if ($movie->poster_path) {
                    $posterPath = $movie->poster_path;
                    DB::table('movies')->insert([
                        'name' => $movie->name,
                        'overview' => $movie->overview,
                        'first_air_date' => $movie->first_air_date,
                        'poster_path' => $posterPath,
                        'genre_id' => Genre::pluck('apiId')->random(),
                        "created_at" => Carbon::now(),
                        "updated_at" => Carbon::now()
                    ]);
                    $fullPath = 'http://image.tmdb.org/t/p/w1000_and_h563_face' . $posterPath;
                    $filename = basename($fullPath);

                    Image::make($fullPath)->save(public_path('images/posters/' . $filename));
                }
            }
        }
    }
}
