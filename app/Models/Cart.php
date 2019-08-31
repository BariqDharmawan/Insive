<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = [
      'user_id', 
      'shipping_id',
      'logic_id',
      'cart_code',
      'formula_code',
      'total_qty',
      'total_price',
      'tracking_number',
      'status',
      'type_cart',
      'snap_token'
    ];
}
