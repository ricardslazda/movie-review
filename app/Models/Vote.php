<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function review()
    {
        return $this->belongsTo(Review::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
