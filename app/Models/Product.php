<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';
    protected $casts = [
        'price' => 'integer',
        'qty' => 'integer'
    ];

    public function getProductNameAttribute($value) 
    {
        return ucfirst($value);
    }

    public function getTypeAttribute($value)
    {
        return mb_strtoupper($value);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::create($value)->diffForHumans() ?? '-';
    }
}
