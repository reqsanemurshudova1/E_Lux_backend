<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'basket_id',
        'quantity',
        'uid',
        'status',
        'address',
        'payment_type',
        'total',
    ];
    
  
    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }

  
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
