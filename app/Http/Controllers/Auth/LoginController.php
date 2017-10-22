<?php

namespace App\Http\Controllers\Auth;

use Alert;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    use AuthenticatesUsers{

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // 
    // protected $redirectTo = '/home';
    redirectPath as redirectLogin;
    }
    public function redirectLogin($request, $user)
    {   
        Alert::message('Message', 'Optional Title');
        return Redirect:: Home();
        
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
}
