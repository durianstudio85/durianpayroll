<?php

namespace App\Options;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $fillable = [
        'name', 
        'description', 
        'user_id', 
        'update_user_id', 
    ];
}
