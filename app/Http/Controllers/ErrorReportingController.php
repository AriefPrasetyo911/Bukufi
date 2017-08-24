<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Error_Reporting;
use Auth;
use Session;

class ErrorReportingController extends Controller
{
    public function sendError(Request $request)
    {
    	$this->validate($request, [
            'error_url' 		=> 'required',
            'error_message'		=> 'required',
        ]);

        $user_id		= $request->user_id;
        $error_url		= $request->error_url;
        $error_message	= $request->error_message;
        $error_desc		= $request->error_desc;

        if (auth()->guard('user')->user()) {
        	$login_user				= new Error_Reporting();
        	$login_user->user_id	= $user_id;
        	$login_user->error_url	= $error_url;
        	$login_user->error_message 	= $error_message;
        	$login_user->error_description	= $error_desc;
        	$login_user->save();

        	Session::flash('notif', 'Thank you for your reporting :)');
        	return redirect()->route('home.index');
        }
        else{
        	$login_user				= new Error_Reporting();
        	$login_user->error_url	= $error_url;
        	$login_user->error_message 	= $error_message;
        	$login_user->error_description	= $error_desc;
        	$login_user->save();

        	Session::flash('notif', 'Thank you for your reporting :)');
        	return redirect()->route('home.index');
        }
    }
    
    public function sendErrorBook(Request $request)
    {
        $this->validate($request, [
            'error_url'         => 'required',
            'error_message'     => 'required',
        ]);

        $user_id        = $request->user_id;
        $error_url      = $request->error_url;
        $error_message  = $request->error_message;
        $error_desc     = $request->error_desc;

        if (auth()->guard('user')->user()) {
            $login_user             = new Error_Reporting();
            $login_user->user_id    = $user_id;
            $login_user->error_url  = $error_url;
            $login_user->error_message  = $error_message;
            $login_user->error_description  = $error_desc;
            $login_user->save();

            Session::flash('notif', 'Thank you for your reporting :)');
            return redirect()->route('books');
        }
        else{
            $login_user             = new Error_Reporting();
            $login_user->error_url  = $error_url;
            $login_user->error_message  = $error_message;
            $login_user->error_description  = $error_desc;
            $login_user->save();

            Session::flash('notif', 'Thank you for your reporting :)');
            return redirect()->route('books');
        }
    }

    public function sendErrorComic(Request $request)
    {
        $this->validate($request, [
            'error_url'         => 'required',
            'error_message'     => 'required',
        ]);

        $user_id        = $request->user_id;
        $error_url      = $request->error_url;
        $error_message  = $request->error_message;
        $error_desc     = $request->error_desc;

        if (auth()->guard('user')->user()) {
            $login_user             = new Error_Reporting();
            $login_user->user_id    = $user_id;
            $login_user->error_url  = $error_url;
            $login_user->error_message  = $error_message;
            $login_user->error_description  = $error_desc;
            $login_user->save();

            Session::flash('notif', 'Thank you for your reporting :)');
            return redirect()->route('comics');
        }
        else{
            $login_user             = new Error_Reporting();
            $login_user->error_url  = $error_url;
            $login_user->error_message  = $error_message;
            $login_user->error_description  = $error_desc;
            $login_user->save();

            Session::flash('notif', 'Thank you for your reporting :)');
            return redirect()->route('comics');
        }
    }
}
