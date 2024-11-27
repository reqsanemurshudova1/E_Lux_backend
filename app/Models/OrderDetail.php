<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
protected $fillable = [
    'order_id',
    'product_name',
    'size',
    'date',
    'uid',
    'price',
    'quantity',
    'total',
];



    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
