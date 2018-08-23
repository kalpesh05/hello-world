<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('guest:admin')->except('logout');
    }

    public function showLogin()
    {
    	return view('auth.admin.login');
    }

    // Log in
    public function Login(Request $request)
    {
    	// Validate the form data
	// dd($request);

    		$this->validate($request,[
    			'email' => 'required|email',
    			'password' => 'required|min:6'
    		]);
    		$credentials['email'] = $request->email;
       		$credentials['password'] = $request->password; 

    	// Attempt to log user log in
    		if(Auth::guard('admin')->attempt($credentials,$request->remember)){
    	
  			    // If successfull, then redirect to instednded location
    				return redirect()->intended(route('admin.dashboard'));
	
    		}else{
		    	// If unsuccessfull, then redirect back to form data
       	
    			return redirect()->back()->withInput($request->only('email','remember'));
    		}  	


    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }

}
