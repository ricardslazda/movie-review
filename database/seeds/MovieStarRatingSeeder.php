<?php

use App\Models\StarRating;
use Illuminate\Database\Seeder;

class MovieStarRatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(StarRating::class, 30)->create();
    }
}
