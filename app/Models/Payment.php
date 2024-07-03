<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'payment_method',
        'payment_total',
        'payment_bank_name',
        'payment_network',
        'payment_card_number',
        'payment_cardholder_name',
        'payment_expiry_date',
        'payment_cvv',
    ];
}
