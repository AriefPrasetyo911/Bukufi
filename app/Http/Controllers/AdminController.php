<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function dashboard(){
        $user = auth()->guard('admin')->user();
        
        $title 	= "Admin Dashboard";
        return view('Back-end.Administrator.index', compact('title'));
    }
}
