<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;
use DB;

class LatestComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title      = 'Latest Comic';
        $date_now   = date('Y-m-d h:i:s');
        $date_3d    = date('Y-m-d h:i:s', strtotime('-3 days', time()));

        
        /*$filter     = DB::table('comics')->whereBetween('created_at', [$date_3d, $date_now])->get();*/

        $filter     = Comic::where('created_at', '>=', $date_3d)
                            ->where('created_at', '<=', $date_now)->get();
        $genres     = DB::table('comic_genres')->limit(10)->orderBy('comic_genre', 'asc')->get();

        return view('Front-end.Single.single-latest-comic', compact('title', 'filter', 'genres'));
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
        //
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
        //
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
