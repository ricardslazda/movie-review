<?php

use App\Models\Vote;
use Illuminate\Database\Seeder;

class ReviewVoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Vote::class, 30)->create();
    }
}
