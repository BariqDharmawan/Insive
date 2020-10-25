<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDiscount extends Model
{
    protected $fillable = ['product_id', 'discount_price'];
    protected $table = 'product_discount';

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
