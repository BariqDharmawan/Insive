<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCart extends Model
{
    protected $table = 'sub_carts';

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
}
