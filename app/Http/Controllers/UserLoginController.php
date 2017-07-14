<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

	public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

	public function getUserLogin()
    {
        if (auth()->guard('user')->user()) 
        {
            return redirect()->route('user.dashboard');
        }
        return view('userLogin');
    }

	public function userAuth(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if (auth()->guard('user')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            return redirect()->route('user.dashboard');
        }else{
            dd('your username and password are wrong.');            
        }
    }
}
