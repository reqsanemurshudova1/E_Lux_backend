<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_photo',
        'profile_name',
        'comment',
        'like',
        'dislike',
        'time',
        'common_review',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
