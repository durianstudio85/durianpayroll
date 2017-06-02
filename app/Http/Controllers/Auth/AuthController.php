<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use App\Company;
use App\Options\Company_user;
use App\Activation_code;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */


    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        
        if (isset($data['activation_code'])) {
            $activation = Activation_code::where('token_code', '=', $data['activation_code'])->where('email', '=', $data['email'])->first();
            if (!empty($activation)) {
                $user = User::create([
                    'first_name' => $data['first_name'],
                    'last_name' => $data['last_name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password']),
                ]);
                $lastid = $user->id;   
                
                $connect = Company_user::create([
                    'user_id' => $lastid,
                    'company_id' => $activation->company_id,
                    'company_position' => 'employee',
                ]);
                
                $activation->update(['status'=>'none']);
                
                return $user;
                
            }else{
                return redirect()->back();
            }
            
             
        }else{
            
            $user = User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
            ]);
            $lastid = $user->id;   
            
            $business = Company::create([
                'user_id' => $lastid,
                'company_name' => $data['company_name'],
                'nav' => 'side',
            ]);
            
            $connect = Company_user::create([
                'user_id' => $lastid,
                'company_id' => $business->company_id,
                'company_position' => 'admin',
            ]);
            
            return $user;
        }
       
    }

}
