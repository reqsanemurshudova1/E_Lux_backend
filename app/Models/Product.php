<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'product_name', 'product_code', 'product_color','image',
        'family_color', 'product_size', 'group_code', 'product_price', 'product_discount',
        'free_shipping', 'free_changes_return', 
        'description', 'wash_care', 'fabric', 'pattern',  
       'meta_title', 'meta_keyword', 'meta_description', 
    ];
    

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
}
