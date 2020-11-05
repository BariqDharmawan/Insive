<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logic extends Model
{
    protected $table = 'logics';

    protected $fillable = ['face_title', 'face_description', 'face_icon'];
}
