<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Carbon\Carbon;
use App\Employee;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('employee');
    }
    
    public function index()
    {
    	$id = auth()->guard('employee')->user()->id;
        $employee = Employee::find($id);
        
        
        if (isset($_GET['date_start']) AND isset($_GET['date_end'])) {
            
            $date_start = $_GET['date_start'];
            $date_end = $_GET['date_end'];
            
            $dateS = Carbon::parse($date_start);
            $dateE = Carbon::parse($date_start);
        
            $attendance = $employee->attendance()->whereBetween('date', [$date_start, $date_end])->get();    
        }else{
            $attendance = $employee->attendance;    
            $date_start = '';
            $date_end = '';
        }
        
    	return view('employee.attendance', compact('attendance', 'date_start', 'date_end'));
    }
    
    public function search($date_start='', $date_end='')
    {
        $id = auth()->guard('employee')->user()->id;
        $employee = Employee::find($id);
        
        ;
        
        $dateS = Carbon::parse( $date_start);
        $dateE = Carbon::parse( $date_start);
        // $result = ModelName::
        
        $attendance = $employee->attendance()->whereBetween('date', [$dateS->format('Y-m-d'), $dateE->format('Y-m-d')])->get();
        
        return view('employee.attendance', compact('attendance'));
    }

}
