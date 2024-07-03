<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'venue_id',
        'user_id',
        'username',
        'review_rating',
        'review_feedback',

    ];
}
