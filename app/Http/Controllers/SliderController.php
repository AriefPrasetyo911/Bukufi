<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider_carousel;
use File;
use Storage;
use Session;

class SliderController extends Controller
{
    public function index()
    {
        $title      = "Bukufi : Carousel Slider";
    	$carousel 	= Slider_carousel::all();
    	return view('Back-end/Slider/index', compact('title','carousel'));
    }

    public function insertSlider(Request $request)
    {
    	$this->validate($request, [
            'slider_image'		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $image_slider		= $request->file('slider_image');
        $image_slider_name  = time().'_'.$image_slider->getClientOriginalName();
        $request->file('slider_image')->move('theme/Slider_carousel/', $image_slider_name);

        $carousel 						= new Slider_carousel();
        $carousel->slider_image 		= $image_slider_name;
        $carousel->save();

        Session::flash('notif', 'Slider successfully added.');
        return redirect()->route('slider');
    }

    public function deleteSlider($id)
    {
    	$data = Slider_carousel::find($id);
    	$image_path = public_path()."\\theme\Slider_carousel\\".$data->slider_image;
    	
        $deletes = unlink($image_path);

        if($deletes)
        {
            $data->delete();
            
            Session::flash('notif', 'Slider successfully deleted.');
            return redirect()->route('slider');
        }
        else{
            return "Slider book doesn't deleted";
        }
    }
}
