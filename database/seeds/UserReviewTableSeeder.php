<?php

use App\Models\Review;
use App\Models\Vote;
use Illuminate\Database\Seeder;

class UserReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 5)->create()->each(function ($user) {
            $user->reviews()
                ->saveMany(factory(Review::class, rand(1,5))->make()
            );
        });
    }
}
