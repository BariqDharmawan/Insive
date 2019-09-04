<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCart extends Model
{
    protected $table = 'sub_carts';

    public function getCustomer()
    {
      return $this->belongsTo('App\User');
    }
}
