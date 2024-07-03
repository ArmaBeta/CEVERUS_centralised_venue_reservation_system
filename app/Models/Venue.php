<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $fillable = [
        'venue_title',
        'image',
        'venue_address',
        'venue_town',
        'venue_postcode',
        'venue_city',
        'venue_size',
        'venue_availability',
        'description',
        'price',
        'user_id',
        'venue_status',
    ];
}
