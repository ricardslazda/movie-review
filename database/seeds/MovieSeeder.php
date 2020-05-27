<?php

use App\Models\Genre;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pageCount = 3;

        $client = new Client();
        for ($i=1; $i < $pageCount; $i++) {
            $api = 'https://api.themoviedb.org/3/tv/popular?api_key=99880aa5851439f69dc4da9e68f79d59&language=en-US&page=' . $i;
            $response = $client->request('GET', $api);
            $movies = json_decode($response->getBody()->getContents())->results;
            foreach ($movies as $movie) {
                if ($movie->poster_path) {
                    DB::table('movies')->insert([
                        'name' => $movie->name,
                        'overview' => $movie->overview,
                        'first_air_date' => $movie->first_air_date,
                        'poster_path' => $movie->poster_path,
                        'genre_id' => Genre::pluck('apiId')->random(),
                        "created_at" => Carbon::now(),
                        "updated_at" => Carbon::now()
                    ]);
                }
            }
        }
    }
}
