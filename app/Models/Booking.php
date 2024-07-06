<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'venue_id',
        'booking_name',
        'booking_email',
        'booking_phone',
        'booking_start_date',
        'booking_end_date',
        'booking_purpose',
        'booking_no_participants',
        'booking_status',
        'user_id',
        'booking_payment_method',
        'booking_total',
        'booking_days',
        'booking_reason',
        'booking_bank_name',
        'booking_payment_network',
        'booking_card_number',
        'booking_cardholder_name',
        'booking_expiry_date',
        'booking_cvv',
    ];

    public function venue()
    {
        return $this->hasOne('App\Models\Venue', 'id', 'venue_id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
