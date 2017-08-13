<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic_bookmark;
use Carbon\Carbon;
use DB;
use Session;

class UserBookmarkComic extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //
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
    public function store(Request $request, $id)
    {

        $id_user        = $request->id_user;
        $comic_title    = $request->comic_title;
        $comic_chapter  = $request->comic_chapter;
        $chapter_title  = $request->chapter_title;

        $check = DB::table('comic_bookmarks')->select('comic_title','comic_chapter')->where('comic_title', '=', $comic_title)->where('comic_chapter', '=', $comic_chapter)->distinct()->get(['comic_title','comic_chapter']);

        if (count($check)) {
            foreach ($check as $cek) {
                //check data jika ada data
                $comic_title_now    = $cek->comic_title;
                $comic_chapter_now  = $cek->comic_chapter;

                if (($comic_title_now == $comic_title) && ($comic_chapter_now == $comic_chapter)) {
                
                    Session::flash('error', 'You already add this comic to bookmark.');
                    return redirect('/show/comic/'.$comic_title.'/'.$comic_chapter);
                }
                else{
                    
                    $simpan                 = new Comic_bookmark();
                    $simpan->user_id        = $id_user;
                    $simpan->comic_title    = $comic_title;
                    $simpan->comic_chapter  = $comic_chapter;
                    $simpan->chapter_title  = $chapter_title;
                    $simpan->save();

                    Session::flash('notif', 'You success add this comic to bookmark.');
                    return redirect('/show/comic/'.$comic_title.'/'.$comic_chapter);
                }
            }
        }
        else{
            //jika tidak ada data
            $simpan                 = new Comic_bookmark();
            $simpan->user_id        = $id_user;
            $simpan->comic_title    = $comic_title;
            $simpan->comic_chapter  = $comic_chapter;
            $simpan->chapter_title  = $chapter_title;
            $simpan->save();

            Session::flash('notif', 'You success add this comic to bookmark.');
            return redirect('/show/comic/'.$comic_title.'/'.$comic_chapter);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title      = "Bukufi : User Bookmark";
        $bookmarks  = Comic_bookmark::where('user_id', $id)->get();

        return view('Back-end/User/bookmark/user-bookmark-comic', compact('bookmarks', 'title'));
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

    public function user_bookmark($id)
    {

        //detect Browser
        $browsers   = $_SERVER['HTTP_USER_AGENT'];

        $chrome     = '/Chrome/';
        $safari     = '/Safari/';
        $opera      = '/OPR/';
        $firefox    = '/Firefox/';
        $ie         = '/MSIE/';

        if (preg_match($chrome, $browsers)) {
            $data = 'Chrome';
        }

        if (preg_match($safari, $browsers)) {
            $data = 'Safari';
        }

        if (preg_match($opera, $browsers)) {
            $data = 'Opera';
        }

        if (preg_match($firefox, $browsers)) {
            $data = 'Firefox';
        }

        if (preg_match($ie, $browsers)) {
            $data = 'IE';
        }

        //grab information
        $ip_addr    = $_SERVER['REMOTE_ADDR'];
        $brows      = $data;
        $visit      = 1;

        $hari_ini   = date('Y-m-d');        

        $range      = DB::table('visitors')
                            ->where('ip_address', $ip_addr)
                            ->where('dates', '>=' ,$hari_ini )->get();
                      
        if (count($range)) {
            
           //jika ditemukan ip yang sama dari hari yang lalu, data dilarang masuk 
            
        }
        else{
            
            //jika tidak ditemukan berarti ip client sudah ada di database untuk hari ini, data bisa masuk
            $insert = new Visitor();
            $insert->ip_address = $ip_addr;
            $insert->browser    = $brows;
            $insert->counter    = $visit;
            $insert->dates      = $hari_ini;
            $insert->save();
        }

        //------------------------------//
        
        $title          = "Bukufi : User Bookmark List";
        $user_bookmarks = Comic_bookmark::select('comic_title', 'comic_chapter', 'chapter_title', 'created_at')->where('user_id', $id)->distinct()->paginate(10);

        $genres = DB::table('comic_genres')->limit(20)->orderBy('comic_genre', 'asc')->get();

        return view('Back-end/User/bookmark/show-user-bookmark', compact('user_bookmarks', 'genres', 'title'));
    }
}
