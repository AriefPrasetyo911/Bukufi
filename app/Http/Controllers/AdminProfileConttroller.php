<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Admin;
use Auth;
use Session;

class AdminProfileConttroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $title  = "Bukufi : Administrator Profile";
        $admins = DB::table('admins')->where('id', $id)->get();

        return view('Back-end.Administrator.admin-profile', compact('title', 'admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title      = "Bukufi : Edit Administrator Profile";
        $item       = Admin::find($id);

        return view('Back-end.Administrator.edit-admin-profile', compact('title', 'item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'              => 'required|max:100',
            'email'             => 'required|email',
            'password'          => 'required|min:6',
            'confirm_password'  => 'required|same:password',
            'current_password'  => 'required'
        ]);

        $curr  = $request->current_password;
        $pass  = Admin::find(auth()->guard('admin')->user()->id);

       
        if ($pass == $curr) {
           
            Session::flash('notif-fail', 'Administrator data failed to changed.');
            return redirect(url('/admin/profile/id/'.$id));

        }
        else{

            $data = Admin::find($id);
            $data->name     = $request->name;
            $data->email    = $request->email;
            $data->password = bcrypt($request->password);
            $data->update();

            Session::flash('notif', 'Administrator data successfully changed.');
            return redirect(url('/admin/profile/id/'.$id));
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
