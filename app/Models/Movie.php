<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function starRatings()
    {
        return $this->hasMany(StarRating::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
