<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;
use Auth;
use DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
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
        
        $title          = "Bukufi : Search";
        $search_now     = $request->get('search');
        $query          = Comic::where('comic_title', 'LIKE', '%'.$search_now.'%')
                             ->orWhere('comic_author', 'LIKE', '%'.$search_now.'%')
                             ->orWhere('comic_genre', 'LIKE', '%'.$search_now.'%')
                             ->orWhere('comic_release', 'LIKE', '%'.$search_now.'%')->orderBy('comic_title', 'asc')->paginate(6);

        $query_sm       = Comic::where('comic_title', 'LIKE', '%'.$search_now.'%')
                             ->orWhere('comic_author', 'LIKE', '%'.$search_now.'%')
                             ->orWhere('comic_genre', 'LIKE', '%'.$search_now.'%')
                             ->orWhere('comic_release', 'LIKE', '%'.$search_now.'%')->orderBy('comic_title', 'asc')->paginate(4);

        $query_xs       = Comic::where('comic_title', 'LIKE', '%'.$search_now.'%')
                             ->orWhere('comic_author', 'LIKE', '%'.$search_now.'%')
                             ->orWhere('comic_genre', 'LIKE', '%'.$search_now.'%')
                             ->orWhere('comic_release', 'LIKE', '%'.$search_now.'%')->orderBy('comic_title', 'asc')->paginate(2);

        return view('Front-end/Search/search-result', compact('search_now','query', 'query_sm', 'query_xs'));
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
