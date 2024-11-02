<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingMethod extends Model
{
    protected $fillable = [
        'name',
        'price',
        'description',
        'delivery_time',
        'restrictions',
        'carrier',
        'min_amount',
        'max_amount',
        'additional_charges',
    ];
}
