<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Loan_item;

class Loan extends Model
{
    protected $fillable = [
        'company_id', 
        'employee_id', 
        'date_start', 
        'loan_amount', 
        'amount_per_pay',
        'status', 
    ];
    
    
    public function loan_items()
    {
        return $this->hasMany('App\Loan_item');
    }
    
    public function balance($id='')
    {
    	$loan = Loan::find($id);
    	$total = 0;
    	
		if ( !empty($loan) ) {
	        foreach ($loan->loan_items as $list) {
	            $total += $list->amount;
	        }
           	return $loan->loan_amount - $total;
        }else{
            return $loan->loan_amount;
        }
    	
    }
}
