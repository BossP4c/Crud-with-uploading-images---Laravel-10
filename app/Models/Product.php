<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',                      // This is matched with 'create_product_input' content
        'qty',
        'price',
        'expiration_date'
    ];

}
