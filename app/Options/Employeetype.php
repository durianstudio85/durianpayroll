<?php

namespace App\Options;

use Illuminate\Database\Eloquent\Model;

class Employeetype extends Model
{
    protected $fillable = [
        'type', 
        'user_id', 
        'update_user_id', 
    ];
}
