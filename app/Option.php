<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
        'company_id', 
        'category', 
        'category_id', 
    ];


    
}
