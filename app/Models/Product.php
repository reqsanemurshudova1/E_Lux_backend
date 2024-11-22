<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductsDescription;


class Product extends Model
{
    protected $fillable = [
        'category_id', 'product_name', 'product_code', 'product_color','image',
        'family_color', 'product_size', 'group_code', 'product_price', 'product_discount',
        'free_shipping', 'free_changes_return',
        'description', 'wash_care', 'fabric', 'pattern',
       'meta_title', 'meta_keyword', 'meta_description','in_stock','quantity'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productsDescription()
    {
        return $this->hasOne(ProductsDescription::class);
    }
    public function basketProducts()
    {
        return $this->hasMany(BasketProduct::class);
    }
    public function description()
{
    return $this->hasOne(ProductsDescription::class, 'product_id');
}
public function reviews()
{
    return $this->hasMany(ProductReview::class);
}


    
}
