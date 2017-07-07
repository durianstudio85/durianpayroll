<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan_item extends Model
{
    protected $fillable = [
		'loan_id',
        'amount',
        'status',
        'date',
    ];
}
