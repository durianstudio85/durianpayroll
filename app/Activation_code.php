<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activation_code extends Model
{
    protected $fillable = [
        'email',
        'company_id', 
        'token_code', 
    ];
}
