<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'user_id',
        'update_user_id', 
        'name', 
        'description', 
    ];
}
