<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fragrance extends Model
{
    protected $casts = [
        'is_available' => 'boolean',
    ];
}
