<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Comic_chapter;
use App\Comic;
use Session;
use Illuminate\Support\Facades\Storage;
use Redirect;
use DB;

class ComicChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title      = "Comic Chapter";
        $chapter   = Comic_chapter::distinct()->get(['comic_title', 'comic_chapter', 'chapter_title']);

        return view('Back-end.Comic-chapter.comic-chapter', compact('title', 'chapter'));
    }

    public function addChapter($id)
    {
        $comics    = Comic::find($id);
        $title     = "Add Comic Chapter";

        return view('Back-end.Comic-chapter.comic-chapter-add', compact('comics', 'title'));
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
    public function store(Request $request , $id)
    {   

        //get the file
        $files  = $request->file('comic_image');

        //counting of upload image
        $file_count = count($files);

        //start count how many uploaded
        $uploadCount = 0;


        foreach ($files as $file) {

            //validation
            $this->validate($request, [
                'comic_chapter'     => 'required',
                'comic_image'       => 'required|max:15360',
                'chapter_title'     => 'required',
            ]);

            
                $comic_images       = time().'_'.$file->getClientOriginalName();
                $upload_success     = $file->move('theme/images_comic/', $comic_images);
                $uploadCount++;

                //store to database
                $comic_image_size   = $file->getClientSize();

                $filechapter = new Comic_chapter();
                $filechapter->comic_id         = $request->comic_id;
                $filechapter->comic_title      = $request->comic_title;
                $filechapter->comic_chapter    = $request->comic_chapter;

                $filechapter->comic_image      = $comic_images;
                $filechapter->comic_image_size = $comic_image_size;

                $filechapter->chapter_title    = $request->chapter_title;
                $filechapter->save();
            
            
        }

        if ($uploadCount == $file_count) {
            Session::flash('notif', 'Comic chapter successfully added.');
            return redirect()->route('comic.list');
        }
        else
        {
            return Redirect::to('/admin/comic/' .$id. '/chapter')->withInput()->withErrors($validator);
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
        $data   = Comic_chapter::where('comic_chapter', '=', $id)->get();

        foreach ($data as $images) {
            
            $image_path     = public_path().'/theme/images_comic'.'/'.$images->comic_image;
            $deletes        = unlink($image_path);
        }

        if ($deletes) {
            
            $data->delete();
            Session::flash('notif', 'Comic successfully deleted.');
            return redirect()->route('comic.chapter');
        }
        else{
            return "image file doesn't deleted";
        }
    }   
}
