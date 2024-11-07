<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    protected $fillable = ['title', 'content', 'author', 'category', 'image', 'author_image', 'author_bio',  'seller'];
}
