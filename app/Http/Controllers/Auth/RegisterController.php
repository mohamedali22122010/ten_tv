<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\UserVerifyAccount;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
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
        $this->middleware(['guest','frontend'], ['except' => ['logout','redirect']]);
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
            'name' => 'required|max:255',
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
    	$type = $data['type'];
        if($type == 1){
            $role_id = 3;
        }
		elseif($type == 2){
            $role_id = 4;
        }
		elseif($type == 3){
            $role_id = 5;
        }
		elseif($type == 4){
            $role_id = 6;
        }else{
        	$role_id = 6;
        }
        $data['confirmation_code'] = str_random(30);
        return User::create([
            'name' => $data['name'],
        	'role_id' => $role_id,
            'password' => bcrypt($data['password']),
            'email' => $data['email'],
            'confirmation_code' => str_random(30)
        ]);
    }
	
	protected function getCredentials(Request $request)
	{
	    return [
	        $this->loginUsername() => $request->input($this->loginUsername()),
	        'password' => $request->input('password'),
	        'confirmed' => 1
	    ];
	}
		
	
	/**
    * Handle a registration request for the application.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function register(Request $request)
    {	
		$validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = $this->create($request->all());
		Mail::to($user->email)->send(new UserVerifyAccount($user));	
        return redirect()->to('/')->with(['successMessage'=>'Please Check Your Email To Verify Your Account To Login']);
    }
	
	
	public function confirmCode(Request $request)
    {
       if( ! $request->confirmation_code)
        {
            abort(404,"Invalid Confirmation Code");
        }

        $user = User::where("confirmation_code","=",$request->confirmation_code)->first();
        if ( ! $user)
        {
            abort(404,"Invalid Confirmation Code");
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();
		auth()->login($user);
		
        if(in_array(auth()->user()->role_id, [1,2,3,4,5]) && auth()->user()->status == 1 && auth()->user()->confirmed == 1){
        	return redirect()->to('/backend');
        }
		
		return redirect()->to('/');	
    }
}
