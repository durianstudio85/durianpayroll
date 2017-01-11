<?php

namespace App\Options;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = [
        'name', 
        'user_id', 
        'update_user_id', 
    ];
}
