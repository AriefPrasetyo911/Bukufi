<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Visitor;
use Carbon;

class AdminController extends Controller
{
    public function dashboard(){
        $user 	= auth()->guard('admin')->user();
        
        $title 	= "Admin Dashboard";

        $bulan 				= date("Y-m-d",mktime(0,0,0,date('m')-1,date('d'),date('Y')));
        $minggu_lalu  		= date("Y-m-d",mktime(0,0,0,date('m'),date('d')-7,date('Y')));
        $hari_ini			= date("Y-m-d",mktime(0,0,0,date('m'),date('d'),date('Y')));

        $all 				= Visitor::all();
        $visitor_today		= Visitor::where('dates', '=', $hari_ini)->get();
        $visitor_mingguan 	= Visitor::whereBetween('dates', [$minggu_lalu, $hari_ini])->get();
        $visitor_bulanan	= Visitor::whereBetween('dates', [$bulan, $hari_ini])->get();

        $sum_visitor_today	= count($visitor_today);
        $sum_visitor_weekly	= count($visitor_mingguan);
        $sum_visitor_monthly= count($visitor_bulanan);
        $sum_all_visitor	= count($all);

        return view('Back-end.Administrator.index', compact('title', 'visitor_mingguan', 'visitor_today', 'visitor_bulanan', 'sum_visitor_today', 'sum_visitor_weekly', 'sum_visitor_monthly', 'sum_all_visitor'));
    }

}
