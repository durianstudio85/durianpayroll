<?php

namespace App\Options;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'name', 
        'user_id', 
        'update_user_id', 
    ];
}
