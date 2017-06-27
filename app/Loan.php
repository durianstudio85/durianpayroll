<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
		'employee_id',
        'date_start',
        'date_end',
        'total_payment',
        'no_of_pay',
        'amount_per_pay',
        'status',
    ];
    
    public function loan_items()
    {
        return $this->hasMany('App\Loan_item');
    }
}
