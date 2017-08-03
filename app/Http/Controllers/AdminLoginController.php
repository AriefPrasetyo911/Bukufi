<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Session;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
	use AuthenticatesUsers;

    protected $redirectTo = '/';

	public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

	public function getAdminLogin()
    {
        
        if (auth()->guard('admin')->user()) 
        {
       		return redirect()->route('admin.dashboard');
        }

        return view('Login.login-admin');
    }

    public function adminAuth(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            return redirect()->route('admin.dashboard');
        }else{
            Session::flash('notif-fail', 'your username or password are wrong.');
            return redirect()->route('admin.login');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->guest(route( 'admin.login' ));
    }

}
