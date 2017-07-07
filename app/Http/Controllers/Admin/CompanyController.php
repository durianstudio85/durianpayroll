<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function index()
    {
    	$company = Auth::user()->company;
    	return view('admin.company', compact('company'));
    }
    
    
    public function update(Request $request)
    {
    	$company = Auth::user()->company;
        $data = [
            'company_name' => $request->get('company_name'), 
            'trade_name' => $request->get('trade_name'), 
            'org_type' => $request->get('org_type'),
            'company_logo' => $this->uploadLogo($request->file('company_logo'), $company->company_logo),
            'business_address' => $request->get('business_address'),
            'business_city' => $request->get('business_city'),
            'business_zip' => $request->get('business_zip'),
            'business_country' => $request->get('business_country'),
            'contact_email' => $request->get('contact_email'),
            'contact_telephone' => $request->get('contact_telephone'),
            'contact_telephone_ext' => $request->get('contact_telephone_ext'),
            'contact_fax' => $request->get('contact_fax'),
            'contact_web' => $request->get('contact_web'),
            'contact_mobile' => $request->get('contact_mobile'),
            'gov_business_cat' => $request->get('gov_business_cat'),
            'gov_rdo' => $request->get('gov_rdo'),
            'gov_hdmf' => $request->get('gov_hdmf'),
            'gov_tin' => $request->get('gov_tin'),
            'gov_sss' => $request->get('gov_sss'),
            'gov_philhealth' => $request->get('gov_philhealth'),
            'nav' => $request->get('nav'),
            'salary_type' => $request->get('salary_type'),
        ];
        $company->update($data);
        
        return redirect('/company/setup');
    }
    
    public function uploadLogo($file, $current)
    {
        $photo = $file;
        if (isset($photo)) {
            $filename = str_random(20).$photo->getClientOriginalName();
            $photo->move(public_path().'/upload',$filename);
        }else{
            $filename = $current;
        }
        return $filename;
    }
}
