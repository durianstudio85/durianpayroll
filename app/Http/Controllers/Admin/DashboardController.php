<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Options\Tax;
use App\Options\Benefits\Benefit;

use Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	
    	$tax = new Tax;
        $benefit = new Benefit;
        $getTax = $tax->InsertTaxFunction();
        $getBenefit = $benefit->InsertBenefitFunction();
        
    	$company = Auth::user()->company;
    	return view('admin.dashboard', compact('company'));
    }

}
