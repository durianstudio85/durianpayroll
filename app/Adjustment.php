<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adjustment extends Model
{
    protected $fillable = [
        'employee_id',
        'basic_pay', 
        'rate_type', 
        'effective_date', 
        'adjustment_date',
        'adjustment_reason',
        'status',
        'created_by',
        'updated_by',
    ];

    public function getCurrentSalary()
    {
        $adjustment = Adjustment::where('status','=','current')->get();
        $adjustmentInfo = [];
        foreach ($adjustment as $adjustmentGet) {
            $adjustmentInfo[$adjustmentGet->employee_id] = $adjustmentGet->basic_pay;
        }
        return $adjustmentInfo;
    }
    
}
