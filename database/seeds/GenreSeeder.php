<?php

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = new Client();
        $api = 'https://api.themoviedb.org/3/genre/movie/list?api_key=99880aa5851439f69dc4da9e68f79d59&language=en-US';
        $response = $client->request('GET', $api);
        $genres = json_decode($response->getBody()->getContents())->genres;
        foreach ($genres as $genre){
            $body = $genre->name;
            DB::table('genres')->insert([
                'apiId' => $genre->id,
                'body' => $body,
                'slug' => STR::slug($body),
                "created_at" =>  Carbon::now(),
                "updated_at" => Carbon::now()
            ]);
        }
    }
}
