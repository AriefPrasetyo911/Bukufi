<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;
use DB;

class SingleAuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title      = "Comic Author";
        $authors    = DB::table('comics')->distinct()->get(['comic_author']);

        return view('Front-end.Single.single-author', compact('title', 'authors'));
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

    public function author($comic_author)
    {
        $title      = "Comic by Author";
        $authors    = DB::table('comics')->where('comic_author', $comic_author)->get();
        $s_auth     = DB::table('comics')->where('comic_author', $comic_author)->distinct()->get(['comic_author']);

        return view('Front-end.Single.comic_by_author', compact('title', 'authors', 's_auth'));
    }
}
