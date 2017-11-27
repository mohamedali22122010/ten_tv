<?php

namespace App;

use Laravel\Socialite\Contracts\User as ProviderUser;
use Illuminate\Support\Facades\Session;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $type = Session::get('type');
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
        $account = SocialAccount::whereProvider('twitter')
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'twitter',
                'token'    => $providerUser->token
            ]);
            $twitterEmail = $providerUser->getEmail();
            if(!$twitterEmail)
                $twitterEmail = $providerUser->getId().".twitter.com";

            $user = User::whereEmail($twitterEmail)->first();
            if (!$user) {
                $confirmation_code = str_random(30);

                $user = User::create([
                	'name' => $twitterEmail,
                	'role_id' => $role_id,
                	'password' => bcrypt($twitterEmail),
                    'email' => $twitterEmail,
                    'first_name' => $providerUser->getName(),
                    'confirmation_code' => $confirmation_code,
                ]);
                
                $data = array('email'=>$twitterEmail,'first_name'=>$providerUser->getName(),'confirmation_code' => $confirmation_code);
                if($type == 1){ // for music lover
                    $view = "music_lover";
                }if($type == 2){ // for musican
                    $view = "musican";
                }else{
                    $view = "music_lover";
                }
                
                /*if($data['email'] && strpos($data['email'], '@')  !== false) {
                    \Mail::send('mail.verify_'.$view, $data, function($message) use ($data) {
                        $message->to($data['email'], $data['first_name'])
                            ->subject('VERIFY YOUR EMAIL');
                    });
                }*/
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
    
}
