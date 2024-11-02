<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurserviceItem extends Model
{
    use HasFactory;

    protected $fillable = ['header', 'description', 'icon', 'id_time'];
}
