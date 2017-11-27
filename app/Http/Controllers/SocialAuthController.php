<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SocialAccountService;
use Socialite;
use Session;

class SocialAuthController extends Controller
{

	public function redirect(Request $request)
	{
		Session::put('type', $request->type);
        Session::put('lastUrl', \URL::previous());
        Session::save();
	    return Socialite::driver('twitter')->redirect();
	}
		
    public function callback(SocialAccountService $service, Request $request)
    {
        $type = Session::get('type');
        $lastUrl = Session::get('lastUrl');
        // when facebook call us a with token   
        if($request->error && $request->error_description && $request->error_reason){
            return redirect()->to('/')->withError($request->error_description);
        }
		if($request->denied){
            return redirect()->to('/')->withError("Error Auth");
        }
        try{
            $driverData = Socialite::driver('twitter')->user();
        }catch (\Laravel\Socialite\Two\InvalidStateException $ex) {
            return redirect()->to('/')->withError("Error Auth");
        }
        $user = $service->createOrGetUser($driverData);
        Session::forget('type');
        Session::forget('lastUrl');
        Session::save();

        //auth()->login($user);
		
        if($lastUrl && $lastUrl != env('APP_URL') ){
            if(strpos($lastUrl,'register') !== false){
                // do nothing and continue code to redirect by type 
            }else{
                return redirect()->to($lastUrl);
            }
        }
        return redirect()->to('/');
    }
}
