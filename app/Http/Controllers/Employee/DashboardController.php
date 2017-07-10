<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Carbon\Carbon;
use App\Employee;

class DashboardController extends Controller
{
	
    public function __construct()
    {
        $this->middleware('employee');
    }
    
    public function index()
    {
        $id = auth()->guard('employee')->user()->id;
        $employee = Employee::find($id);
        
        $timeOutData = $employee->attendance()->where('time_out', '=', '00:00:00')->first();
        if (!empty($timeOutData)) {
            $time = $timeOutData;
        }else{
            $time = 'timein';
        }
        
    	return view('employee.dashboard', compact('time'));
    }
    
    public function timeIn(Request $request)
    {
        $id = auth()->guard('employee')->user()->id;
        $employee = Employee::find($id);
        
        $ExactBrowserNameUA=$_SERVER['HTTP_USER_AGENT'];

        if (strpos(strtolower($ExactBrowserNameUA), "safari/") and strpos(strtolower($ExactBrowserNameUA), "opr/")) {
            // OPERA
            $ExactBrowserNameBR="Opera";
        } elseIf (strpos(strtolower($ExactBrowserNameUA), "safari/") and strpos(strtolower($ExactBrowserNameUA), "chrome/")) {
            // CHROME
            $ExactBrowserNameBR="Chrome";
        } elseIf (strpos(strtolower($ExactBrowserNameUA), "msie")) {
            // INTERNET EXPLORER
            $ExactBrowserNameBR="Internet Explorer";
        } elseIf (strpos(strtolower($ExactBrowserNameUA), "firefox/")) {
            // FIREFOX
            $ExactBrowserNameBR="Firefox";
        } elseIf (strpos(strtolower($ExactBrowserNameUA), "safari/") and strpos(strtolower($ExactBrowserNameUA), "opr/")==false and strpos(strtolower($ExactBrowserNameUA), "chrome/")==false) {
            // SAFARI
            $ExactBrowserNameBR="Safari";
        } else {
            // OUT OF DATA
            $ExactBrowserNameBR="OUT OF DATA";
        };
        
        $data = [
            'company_id' => $employee->company_id,
            'time_in' => Carbon::now('Asia/Manila'),
            'date' => Carbon::now('Asia/Manila'),
            'ip_address' => request()->ip(),
            'browser' => $ExactBrowserNameBR,
        ];
        
        $employee->attendance()->create($data);
        
        return redirect()->back();
    }
    
    
    public function timeOut(Request $request, $id)
    {
        $userid = auth()->guard('employee')->user()->id;
        $employee = Employee::find($userid);
        
        $timeout = $employee->attendance()->find($id);
        
        $data = [
            'time_out' => Carbon::now('Asia/Manila'),
        ];
        
        $timeout->update($data);
        return redirect()->back();
    }
    
    
    
    public function time()
    {
    	// $time = Carbon::now('Asia/Manila');
    	$dt = Carbon::now('Asia/Manila');
		$time = $dt->format('H:i:s');
		
		$dateData = Carbon::now('Asia/Manila');
		$dates = $dateData->format('Y-m-d');
    	return view('notification.timestamp', compact('time', 'dates'));
    }
}
