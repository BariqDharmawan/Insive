<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $table = 'pricings';
    protected $fillable = ['price_name', 'min_qty', 'max_qty', 'price', 'type_price'];
}
