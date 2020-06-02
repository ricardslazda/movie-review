<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Input\Input;

class Movie extends Model
{
    protected $appends = ['rating'];

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id', 'apiId');
    }

    public function starRatings()
    {
        return $this->hasMany(StarRating::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    private function imageDimensions()
    {
        list($width, $height) = getimagesize('images/logo.png');
        return[
            'width' => $width,
            'height' => $height
        ];
    }

    public function getImageWidthAttribute()
    {
        return $this->imageDimensions()['width'];
    }
    public function getImageHeightAttribute()
    {
        return $this->imageDimensions()['height'];
    }

    public function getRatingAttribute()
    {
        $starRatings = $this->starRatings;
        $count = $starRatings->count();
        if ($count > 0) {
            $total = 0;
            foreach ($starRatings as $starRating) {
                $total += $starRating->star_count;
            }
            return number_format(($total / $count), 1);
        }
        return 0;
    }
}
