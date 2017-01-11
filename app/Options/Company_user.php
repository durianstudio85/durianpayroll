<?php

namespace App\Options;

use Illuminate\Database\Eloquent\Model;

class Company_user extends Model
{
    protected $fillable = [
        'user_id', 
        'company_id', 
    ];
}
