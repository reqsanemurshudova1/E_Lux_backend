<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'header',
        'description',
        'style_count',
        'brand_count',
        'footer_info',
        'img',
    ];
}
