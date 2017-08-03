<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\SocialAccountService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Facades\Config;

class SocialAuthController extends Controller
{
    public function redirectToProvider()
    {
    	return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback(SocialAccountService $service)
    {
    	$user	= $service->createOrGetUser(Socialite::driver('facebook')->user());
    	Auth::guard('user')->login($user);
    	return redirect()->to('user/dashboard/');
    }

    //google
    public function getSocialRedirect()
    {

        /*$providerKey = Config::get('services.' . 'google');

        if (empty($providerKey)) {

            return view('pages.status')
                ->with('error','No such provider');

        }*/

        return Socialite::driver('google')->redirect();

    }

    public function getSocialHandle(SocialAccountService $service)
    {
        $user   = $service->createOrGetUser(Socialite::driver('google')->user());
        Auth::guard('user')->login($user);
        return redirect()->to('user/dashboard/');
    }
}
