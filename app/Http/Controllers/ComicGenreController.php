<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic_genre;
use App\Http\Requests;
use Session;
use Auth;

class ComicGenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title  = "Bukufi : Comic Genre";
        $genres = Comic_genre::all();

        return view ('Back-end.Comic.comic-genre', compact('title', 'genres'));
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
        $this->validate($request, [
            'genre' => 'required|max:50'
        ]);

        $genres     = new Comic_genre();
        $genres->comic_genre = str_replace(' ', '-', $request->genre);
        $genres->save();

        Session::flash('notif', 'Comic genre successfully added.');
        return redirect()->route('comic.genre');
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
        $delete = Comic_genre::find($id);
        $delete->delete();

        Session::flash('notif', 'Comic genre successfully deleted.');
        return redirect()->route('comic.genre');
    }
}
