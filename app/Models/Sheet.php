<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sheet extends Model
{
    protected $table = 'sheet';
    // protected $primaryKey = 'id';
    protected $fillable = ['sheet_name', 'sheet_img', 'is_available', 'price'];
    protected $casts = [
        'is_available' => 'boolean',
    ];
}
