<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard(){
        $user = auth()->guard('user')->user();
        return view('Back-end/User/user-dashboard');
    }
}
