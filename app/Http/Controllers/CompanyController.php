<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Company;
use Auth;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::User();  
        $id = $user->id;
        $company = Company::where('user_id', '=', $id)->get()->first();
        return redirect('/company/setup/'.$company->id); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = new Company;
        $comID = $company->getComId();
        
        if ( $comID == $id ){
            $company = Company::findOrFail($id);
            return view('pages.company-setup.company-organization.company', compact('company'));
        }else{
            return redirect('/company/setup/'.$comID); 
        }

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);
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
        return redirect('/company/setup/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
