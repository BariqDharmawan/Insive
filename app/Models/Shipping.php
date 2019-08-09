<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = 'shippings';
    protected $fillable = ['user_id', 'city_id', 'name', 'email', 'phone', 'city', 'address', 'status'];
}
