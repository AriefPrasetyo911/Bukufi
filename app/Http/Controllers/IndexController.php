<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;
use App\Comic_chapter;
use App\Comic_genre;
use DB;
use Auth;
use Input;
use App\Visitor;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
            $insert->dates    = $hari_ini;
            $insert->save();
        }

        //------------------------------//

        $title      = 'Latest Comic';

        $today          = date("Y-m-d",mktime(0,0,0,date('m'),date('d'),date('Y')));
        $days_3_ago        = date("Y-m-d",mktime(0,0,0,date('m'),date('d')-3,date('Y')));
        
        /*$filter     = DB::table('comics')->whereBetween('created_at', [$date_3d, $date_now])->get();*/

        $filter     = Comic::whereBetween('dates', [$days_3_ago, $today])->orderBy('created_at', 'desc')->paginate(12);

        $filter_med = Comic::whereBetween('dates', [$days_3_ago, $today])->orderBy('created_at', 'desc')->paginate(8);

        $filter_sm = Comic::whereBetween('dates', [$days_3_ago, $today])->orderBy('created_at', 'desc')->paginate(6);

        $genres     = DB::table('comic_genres')->limit(12)->orderBy('comic_genre', 'asc')->get();
        $status     = DB::table('comic_status')->get();  

        return view('Front-end.Home.home', compact('title', 'filter', 'genres', 'status', 'filter_med', 'filter_sm'));
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

        $single_comic   = DB::table('comics')->where('comic_title',$comic_title)->get();
        $title          = "Comic".' '.$comic_title;
        $genres         = DB::table('comic_genres')->limit(10)->orderBy('comic_genre', 'asc')->get();
        
        /*$get_id         = Comic::select('id')->where('id', '=', $id)->get();        

        $comic_chapter  = DB::table('comic_chapters')->leftJoin('comics', '.comic_chapters'.$get_id, '=', 'comics'.$get_id)->distinct()->get(['comic_chapter', 'chapter_title']);*/

        $comic_chapter  = Comic_chapter::where('comic_title', '=', $comic_title)->orderBy('comic_chapter', 'asc')->distinct()->get(['comic_title','comic_chapter', 'chapter_title']);

        $counts          = count($comic_chapter);
        

        return view('Back-end.Comic.single-comic', compact('single_comic', 'title', 'genres', 'comic_chapter', 'counts'));
    }

    public function showComic(Request $request, $comic_title, $comic_chapter)
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
        
        $title      = "Read Comic " .$comic_title;
        $shows2     = Comic_chapter::where('comic_title' ,$comic_title)->where('comic_chapter' ,$comic_chapter)->paginate(1);

        $shows      = Comic_chapter::where('comic_title', '=' ,$comic_title)->distinct()->get(['comic_title', 'chapter_title', 'comic_chapter']);
        /*$shows  = DB::select("select * from comic_chapters where comic_title =". $comic_title ." and comic_chapter =".$comic_chapter);*/
       
        //grab page number
        $curr_page    = $request->input('page');

        return view('Front-end/Single/read-comic', compact('shows2', 'shows', 'title', 'curr_page'));

    }

    public function comicstatus($status)
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
        
        $status         = Comic::where('comic_status', $status)->paginate(15);
        $genres         = DB::table('comic_genres')->limit(10)->orderBy('comic_genre', 'asc')->get();

        $comic_statuses = DB::table('comic_status')->get();

        return view('Front-end/Single/comic_by_status', compact('status', 'genres', 'comic_statuses'));
    }
}
