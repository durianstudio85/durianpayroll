<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
		'company_id',
        'name',
        'slug',
    ];
    
    
    public function employees()
    {
    	return $this->hasMany('App\Employee');
    }
}
