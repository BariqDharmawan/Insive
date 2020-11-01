<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomProduct extends Model
{
    protected $table = 'custom_products';
    protected $fillable = ['cart_id', 'sheet_id', 'fragrance_id', 'qty', 'price', 'total_price'];
    protected $casts = [
        'qty' => 'integer',
    ];
}
