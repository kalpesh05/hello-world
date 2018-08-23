<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout','userLogout');
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
            if(Auth::guard('web')->attempt($credentials,$request->remember)){
        
                // If successfull, then redirect to instednded location
                 return redirect()->route('home');
    
            }else{
                // If unsuccessfull, then redirect back to form data
        
                return redirect()->back()->withInput($request->only('email','remember'));
            }   


    }

    public function userLogout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }

    
}
