<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Company;
use App\Option;
use App\Options\Department;
use App\Options\Position;
use App\Options\Rank;
use App\Options\Employeetype;
use App\Options\Company_user;
use Auth;

class OptionController extends Controller
{

	public function __construct() {
		$this->middleware('auth');
	}
	

    // Department

    public function departmentIndex()
    {
        
        $department_list = Department::whereIn('id', $this->getOption('department'))->get();
        return view('pages.company-setup.company-organization.company-departments', compact('department_list'));
    }

    public function departmentStore(Request $request)
    {
        $company = new Company;
        $comId = $company->getComId();
        $user_id = Auth::User()->id; 

        $departmentData = [
            'name' => $request->get('name'),
            'user_id' => $user_id,
        ];
        
        $department = Department::Create($departmentData);

        $optionData = [
            'company_id' => $comId,
            'category' => 'department',
            'category_id' => $department->id,
        ];
        Option::Create($optionData);
        return redirect('/company/departments');

    }


    public function departmentUpdate(Request $request, $id)
    {
        $department = Department::findOrFail($id);
        $data = [
            'name' => $request->get('name'), 
            'update_user_id' => Auth::User()->id, 
        ];
        $department->update($data);
        return redirect('/company/departments');
    }



    // Position

    public function positionIndex()
    {
        $position_list = Position::whereIn('id', $this->getOption('position'))->get();
        return view('pages.company-setup.company-organization.company-positions', compact('position_list'));
    }

    public function positionStore(Request $request)
    {
        $company = new Company;
        $comId = $company->getComId();
        $user_id = Auth::User()->id; 

        $positionData = [
            'name' => $request->get('name'),
            'user_id' => $user_id,
        ];
        
        $position = Position::Create($positionData);

        $optionData = [
            'company_id' => $comId,
            'category' => 'position',
            'category_id' => $position->id,
        ];
        Option::Create($optionData);
        return redirect('/company/positions');
    }

    public function positionUpdate(Request $request, $id)
    {
        $position = Position::findOrFail($id);
        $data = [
            'name' => $request->get('name'), 
            'update_user_id' => Auth::User()->id, 
        ];
        $position->update($data);
        return redirect('/company/positions');
    }



    // Rank
    public function rankIndex()
    {
        $rank_list = Rank::whereIn('id', $this->getOption('rank'))->get();
        return view('pages.company-setup.company-organization.company-ranks', compact('rank_list'));
    }

    public function rankStore(Request $request)
    {
        $company = new Company;
        $comId = $company->getComId();
        $user_id = Auth::User()->id; 

        $rankData = [
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'user_id' => $user_id,
        ];
        $rank = Rank::Create($rankData);
        $optionData = [
            'company_id' => $comId,
            'category' => 'rank',
            'category_id' => $rank->id,
        ];
        Option::Create($optionData);
        return redirect('/company/ranks');
    }

    public function rankUpdate(Request $request, $id)
    {
        $rank = Rank::findOrFail($id);
        $data = [
            'name' => $request->get('name'), 
            'description' => $request->get('description'),
            'update_user_id' => Auth::User()->id, 
        ];
        $rank->update($data);
        return redirect('/company/ranks');
    }



    // Employment Type

    public function employeetypeIndex()
    {
        $employee_type_list = Employeetype::whereIn('id', $this->getOption('employee_type'))->get();
        return view('pages.company-setup.company-organization.company-employment-type', compact('employee_type_list'));
    }

    public function employeetypeStore(Request $request)
    {
        $company = new Company;
        $comId = $company->getComId();
        $user_id = Auth::User()->id; 

        $employeetypeData = [
            'type' => $request->get('type'),
            'user_id' => $user_id,
        ];
        $employeetype = Employeetype::Create($employeetypeData);
        $optionData = [
            'company_id' => $comId,
            'category' => 'employee_type',
            'category_id' => $employeetype->id,
        ];
        Option::Create($optionData);
        return redirect('/company/employment-type');
    }

    public function employeetypeUpdate(Request $request, $id)
    {
        $employeetype = Employeetype::findOrFail($id);
        $data = [
            'type' => $request->get('type'), 
            'update_user_id' => Auth::User()->id, 
        ];
        $employeetype->update($data);
        return redirect('/company/employment-type');
    }














    






    public function getOption($category)
    {
        $company = new Company;
        $comId = $company->getComId();
        $option_list = Option::where('category', '=', $category)->where('company_id', '=', $comId)->get();

        $items = array();
        foreach($option_list as $options) {
            $items[] = $options->category_id;
        }
        return $items;
    }

   
    
}


