<?php

namespace App;

use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService 
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
    	$account = SocialAccount::whereProvider('facebook')->whereProviderUserId($providerUser->getId())->first();

    	if ($account) {
    		return $account->user;
    	}
    	else{
    		$account = new SocialAccount([
    			'provider_user_id' => $providerUser->getId(),
    			'provider' => 'facebook']);

    		$user = User::whereEmail($providerUser->getEmail())->first();

    		if (!$user) {
    			$user 	= User::create([
    				'email' => $providerUser->getEmail(),
                    'password'  => Hash::make(str_random(8)),
                    'membership'    => 'Free',
    				'name' 	=> $providerUser->getName()]);
    		}

    		$account->user()->associate($user);
    		$account->save();
    		return $user;
    	}

    }

    public function createOrGetUser2(ProviderUser $providerUser)
    {
        
        $account = SocialAccount::whereProvider('google')->whereProviderUserId($providerUser->getId())->first();

        if ($account) {
            return $account->user;
        }
        else{
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'google']);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
                $user   = User::create([
                    'email' => $providerUser->getEmail(),
                    'password'  => Hash::make(str_random(8)),
                    'membership'    => 'Free',
                    'name'  => $providerUser->getName()]);
            }

            $account->user()->associate($user);
            $account->save();
            return $user;
        }
    }
}
