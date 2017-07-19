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
        $comics = DB::table('comics')->paginate(12);
        $genres = DB::table('comic_genres')->limit(10)->orderBy('comic_genre', 'asc')->get();
        /*$chapter= Comic_chapter::find($id);*/
        $id_comic  = DB::table('comic_chapters')->select('comic_id')->distinct()->get('comic_id');        
        
        return view('Front-end.Home.home', compact('title', 'comics', 'genres', 'id_comic'));
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

    public function comic($comic_title)
    {
        $single_comic   = DB::table('comics')->where('comic_title',$comic_title)->get();
        $title          = "Comic".' '.$comic_title;
        $genres         = DB::table('comic_genres')->limit(10)->orderBy('comic_genre', 'asc')->get();
        
        /*$get_id         = Comic::select('id')->where('id', '=', $id)->get();        

        $comic_chapter  = DB::table('comic_chapters')->leftJoin('comics', '.comic_chapters'.$get_id, '=', 'comics'.$get_id)->distinct()->get(['comic_chapter', 'chapter_title']);*/

        $comic_chapter  = Comic_chapter::where('comic_title', '=', $comic_title)->distinct()->get(['comic_title','comic_chapter', 'chapter_title']);

        $counts          = count($comic_chapter);

        return view('Back-end.Comic.single-comic', compact('single_comic', 'title', 'genres', 'comic_chapter', 'counts'));
    }

    public function showComic($comic_title, $comic_chapter){
        
        $shows2     = Comic_chapter::where('comic_title' ,$comic_title)->where('comic_chapter' ,$comic_chapter)->paginate(1);

        $shows      = Comic_chapter::where('comic_title', '=' ,$comic_title)->distinct()->get(['comic_title', 'chapter_title', 'comic_chapter']);
        /*$shows  = DB::select("select * from comic_chapters where comic_title =". $comic_title ." and comic_chapter =".$comic_chapter);*/

       
        return view('Front-end/Single/read-comic', compact('shows2', 'shows'));
    }
}
