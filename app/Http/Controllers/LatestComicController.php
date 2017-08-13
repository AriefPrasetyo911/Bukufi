<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;
use DB;
use Carbon\Carbon;
use Auth;

class LatestComicController extends Controller
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
            $insert->dates      = $hari_ini;
            $insert->save();
        }

        //------------------------------//

        $title  = "Bukufi : Comic List";
        $comics = DB::table('comics')->orderBy('comic_title', 'asc')->paginate(10);
        $genres = DB::table('comic_genres')->limit(12)->orderBy('comic_genre', 'asc')->get();
        
        $id_comic  = DB::table('comic_chapters')->select('comic_id')->distinct()->get('comic_id'); 
        $comic_statuses = DB::table('comic_status')->get(); 

        return view('Front-end.Single.single-latest-comic', compact('title','comics', 'genres', 'comic_statuses'));
    }

    public function front_comic()
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

        $title          = 'Bukufi : Latest Comic';

        $today          = date("Y-m-d",mktime(0,0,0,date('m'),date('d'),date('Y')));
        $days_3_ago     = date("Y-m-d",mktime(0,0,0,date('m'),date('d')-3,date('Y')));
        
        /*$filter       = DB::table('comics')->whereBetween('created_at', [$date_3d, $date_now])->get();*/

        $filter         = Comic::whereBetween('dates', [$days_3_ago, $today])->orderBy('created_at', 'desc')->paginate(12);

        $filter_med     = Comic::whereBetween('dates', [$days_3_ago, $today])->orderBy('created_at', 'desc')->paginate(8);

        $filter_sm      = Comic::whereBetween('dates', [$days_3_ago, $today])->orderBy('created_at', 'desc')->paginate(6);

        $genres         = DB::table('comic_genres')->limit(12)->orderBy('comic_genre', 'asc')->get();
        $status         = DB::table('comic_status')->get();  

        return view('Front-end/Home/comic', compact('title','filter', 'filter_med', 'filter_sm', 'genres', 'status'));
    }

    public function search_alph(Request $request, $alph)
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
        $title      = "Bukufi : Search Comic by Alphabet";
        $script     = DB::table('comics')->where('comic_title', 'LIKE', $alph.'%')->paginate(10);

        //for genre sidebar
        $genres = DB::table('comic_genres')->limit(20)->orderBy('comic_genre', 'asc')->get();
        $comic_statuses = DB::table('comic_status')->get(); 

        return view('Front-end/Search/by-alphabet-comic-list', compact('title','script', 'genres', 'comic_statuses'));
    }
}
