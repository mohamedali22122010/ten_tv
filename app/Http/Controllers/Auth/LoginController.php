<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/user/redirect';
    protected $redirectAfterLogout = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['guest','frontend'], ['except' => 'logout']);
    }
	
	public function redirect()
	{
		if(Auth::user()->role_id == 4) // this mean regular user
        {
            return redirect()->back();
        }
		if(Auth::user()->role_id == 1) // this mean admin user
        {
            return redirect()->to('/backend');
        }
		return redirect()->to('/');
	}
	
	protected function getCredentials(Request $request)
	{
	    return [
	        $this->loginUsername() => $request->input($this->loginUsername()),
	        'password' => $request->input('password'),
	        'confirmed' => 1
	    ];
	}
		
}
