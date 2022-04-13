<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'customer_id',
        'order_date',
        'delivery_date',
        'delivery_address',
        'shipping_speed',
        'billing_address',
        'total',
        'payment_card_number',
        'payment_card_expiry',
        'payment_card_cvv',
        'payment_card_name',
    ];
    public $timestamp=false;
}
