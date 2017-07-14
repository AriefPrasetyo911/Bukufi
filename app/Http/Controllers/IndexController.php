<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;
use App\Comic_chapter;
use App\Comic_genre;
use DB;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $title  = "Welcome to Bukufi";
        $comics = Comic::all();
        $genres = DB::table('comic_genres')->limit(10)->orderBy('comic_genre', 'asc')->get();
        /*$chapter= Comic_chapter::find($id);*/

        return view('Front-end.Home.home', compact('title', 'comics', 'genres'));
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

    public function comic($id, $comic_title)
    {
        $single_comic   = DB::table('comics')->where('comic_title',$comic_title)->get();
        $title          = "Comic".' '.$comic_title;
        $genres         = DB::table('comic_genres')->limit(10)->orderBy('comic_genre', 'asc')->get();
        
        $comic_chapter  = DB::table('comic_chapters')->leftJoin('comics', '.comic_chapters.comic_id', '=', 'comics.id')->distinct()->get(['comic_chapter', 'chapter_title']);

        return view('Back-end.Comic.single-comic', compact('single_comic', 'title', 'genres', 'comic_chapter'));
    }
}
