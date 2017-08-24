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
use Auth;
use File;

class ComicChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title      = "Bukufi : Comic Chapter";
        $chapter   = Comic_chapter::distinct()->get(['comic_title', 'comic_chapter', 'chapter_title']);

        return view('Back-end.Comic-chapter.comic-chapter', compact('title', 'chapter'));
    }

    public function addChapter($id)
    {
        $comics    = Comic::find($id);
        $title     = "Bukufi : Add Comic Chapter";

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

            //create directory
            $folder     = str_replace('-', ' ', $request->comic_title);
            $path       = public_path('storage\comic\comic_files\\'. $folder);

            //check dir
            if (File::isDirectory($path)) {
                
                //directory exist, just insert data and save
                $upload_success     = $file->move($path, $comic_images);
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

                //

                $com_id     = $request->comic_id;
                $chap_now   = $request->comic_chapter;
                $chap_title = $request->chapter_title;
                $check = DB::table('comics')->where('id', $com_id)->get();

                foreach ($check as $check_conf) {
                    if ($check_conf->last_chapter < $chap_now) {
                        
                        $update_chapter = new Comic();
                        $update_chapter->last_chapter       = $chap_now;
                        $update_chapter->last_chapter_title = $chap_title;
                        $update_chapter->update();
                    }
                }
            }
            else{

                //directory not exist, create dir first
                File::makeDirectory($path, 0777, true);

                //and save
                $upload_success     = $file->move($path, $comic_images);
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

                //

                $com_id     = $request->comic_id;
                $chap_now   = $request->comic_chapter;
                $check = DB::table('comics')->where('id', $com_id)->get();

                foreach ($check as $check_conf) {
                    if ($check_conf->last_chapter <= $chap_now) {
                        
                        $update_chapter = new Comic();
                        $update_chapter->last_chapter   = $chap_now;
                        $update_chapter->last_chapter_title = $request->comic_title;
                        $update_chapter->update();
                    }
                }
            }
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
    public function destroy($comic_nm, $title)
    {
        $folder_name    = str_replace('-', ' ', $comic_nm);
        $comic_chapter  = $title;

        $collection = Comic_chapter::where('chapter_title', $comic_chapter)->get(['chapter_title', 'comic_image']);
        
        
            /*$image_path     = public_path().'/theme/images_comic'.'/'.$images->comic_image;
            $deletes        = unlink($image_path);*/
            return $collection->comic_image;
            //to delete comic image
            $image_path = public_path()."\\storage\comic\comic_files\\".$folder_name.'\\'.$images->comic_image;
            return $image_path;
            $deletes    = unlink($image_path);
        

        Comic_chapter::destroy($collection->toArray());
        /*$data->delete();*/
        Session::flash('notif', 'Comic successfully deleted.');
        return redirect()->route('comic.chapter');
    }   
}
