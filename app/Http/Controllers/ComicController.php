<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Comic;
use App\Comic_chapter;
use App\Comic_genre;
use App\Popular_comic;
use Session;
use Illuminate\Support\Facades\Storage;
use File;
use Auth;
use DB;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title      = "Bukufi : Comic List";
        $comics     = Comic::all();

        return view('Back-end.Comic.comic-list', compact('title', 'comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title      = "Bukufi : Add New Comic";
        $genres     = Comic_genre::all();
        $status     = DB::table('comic_status')->get();

        return view('Back-end.Comic.comic-add', compact('title', 'genres', 'status'));
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
            'comic_title' => 'required|max:100',
            'comic_image' => 'required|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'comic_description' => 'required',
            'comic_author'      => 'required',
            'comic_genre'       => 'required',
            'comic_release'     => 'required',
            'comic_status'      => 'required',
            'r3'                => 'required'
        ]);

        /*$image_name = $request->comic_image->getClientOriginalName();

        $images = $request->file('comic_image');
        $image['comic_image'] = $request->comic_image->getClientOriginalName();
        $destinationPath = public_path('theme/images_cover');
        $images->move($destinationPath, $image['comic_image']);*/

        $file       = $request->file('comic_image');
        $filename   = $file->getClientOriginalName();
        /*$request->file('comic_image')->move('theme/images_cover/', $filename);*/
        $request->file('comic_image')->storeAs('comic/comic_cover', $filename);

        $date       = date('Y-m-d');

        $data   = new Comic();
        $data->comic_title          = str_replace(' ', '-', $request->comic_title);
        $data->comic_image          = $filename;
        $data->comic_description    = $request->comic_description;
        $data->comic_author         = str_replace(' ','-', $request->comic_author);
        $data->comic_genre          = implode(", " , $request->comic_genre);
        $data->comic_release        = $request->comic_release;
        $data->comic_status         = $request->comic_status;
        $data->membership           = $request->r3;
        $data->dates                = $date;
        $data->save();

        Session::flash('notif', 'Comic successfully added.');
        return redirect()->route('comic.list');
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
        $title  = "Bukufi : Edit Comic";
        $item   = Comic::find($id);
        $genres     = Comic_genre::all();

        return view('Back-end.Comic.comic-edit', compact('title', 'item', 'genres'));
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
        $this->validate($request, [
            'comic_title' => 'required|max:100',
            'comic_image' => 'required|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'comic_description' => 'required',
            'comic_author'      => 'required',
            'comic_genre'       => 'required',
            'comic_release'     => 'required',
            'r3'                => 'required'
        ]);

       /* $image_name = $request->comic_image->getClientOriginalName();

        $images = $request->file('comic_image');
        $image['imagename'] = $request->comic_image->getClientOriginalName();
        $destinationPath = public_path('theme\images_cover');
        $image_location = $images->move($destinationPath, $image['imagename']);

        return $image_location;*/

        $dates  = date('Y-m-d');   

        $data   = Comic::where('id', $id)->first();
        $data->comic_title = $request->comic_title;

        if ( $request->file('comic_image') == '') {
            //image not change
            $data->comic_image = $data->comic_image;
        }
        else
        {
            $image_path = public_path()."\\storage\comic\comic_cover\\".$data->comic_image;
            $deletes    = unlink($image_path);


            if($deletes){
                $file       = $request->file('comic_image');
                $filename   = $file->getClientOriginalName();
                $request->file('comic_image')->storeAs('comic/comic_cover', $filename);
                $data->comic_image = $filename;
            }
            else{
                return "comic image not replaced";
            }
        }
        
        $data->comic_description    = $request->comic_description;
        $data->comic_author         = $request->comic_author;
        $data->comic_genre          = implode(", " , $request->comic_genre);
        $data->comic_release        = $request->comic_release;
        $data->membership           = $request->r3;
        $data->dates                = $dates;
        $data->update();

        Session::flash('notif', 'Comic successfully edited.');
        return redirect()->route('comic.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $name)
    {
        $comic_name     = str_replace('-', ' ', $name);
        
        //delete data comic
        $data           = Comic::find($id);
        $data->delete();

        //to delete comic image
        $image_path = public_path()."\\storage\comic\comic_cover\\".$data->comic_image;
        $deletes    = unlink($image_path);

        //to delete comic chapter directory
        $image_path2 = public_path()."\\storage\comic\comic_files\\".$comic_name;

        if (File::isDirectory($image_path2))
        {
            $deletes2    = File::cleanDirectory($image_path2);
        }
        else{
           //do nothing
        }

        //then delete data in comic chapter table
        $del        = Comic_chapter::where('comic_title', $name)->get();
        $del->delete();

        Session::flash('notif', 'Comic successfully deleted.');
        return redirect()->route('comic.list');
    }
}
