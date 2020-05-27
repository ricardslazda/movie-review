<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class StarRating extends Model
{
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
