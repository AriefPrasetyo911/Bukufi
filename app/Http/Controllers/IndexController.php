<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comic;
use App\Comic_chapter;
use App\Comic_genre;
use App\Book;
use App\Visitor;
use App\Slider_carousel;
use App\Popular_comic;
use App\Popular_book;
use DB;
use Auth;
use Input;


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

        $title      = 'Bukufi : Home';

        $books      = Book::take(4)->get();
        $books2     = DB::table('books')->skip(4)->take(4)->get();

        $carousel   = Slider_carousel::orderBy('created_at', 'desc')->limit(1)->get();
        $carousel2  = Slider_carousel::orderBy('created_at', 'desc')->skip(1)->take(2)->get();
        
        $popular_book_1         = Popular_book::orderBy('counter', 'desc')->take(4)->get();
        $popular_book_2         = Popular_book::orderBy('counter', 'desc')->skip(4)->take(4)->get();

        $popular_comics_1       = Popular_comic::orderBy('counter', 'desc')->take(4)->get();
        $popular_comics_2       = Popular_comic::orderBy('counter', 'desc')->skip(4)->take(4)->get();
        
        return view('Front-end.Home.home', compact('title', 'books', 'books2', 'carousel', 'carousel2', 'popular_book_1', 'popular_book_2', 'popular_comics_1', 'popular_comics_2'));
    }   

    public function comic(Request $request, $comic_title)
    {

        //detect Browser
            $browsers   = $_SERVER['HTTP_USER_AGENT'];

            $chrome     = '/Chrome/';
            $safari     = '/Safari/';
            $opera      = '/OPR/';
            $firefox    = '/Firefox/';
            $ie         = '/MSIE/';

            if (preg_match($chrome, $browsers)) {
                $data = 'Google Chrome';
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

        //insert data for popular comic

            $comic_name     = $request->segment(2);
            $visit          = 1;
           
            //first, check comic_title already exist or not
            $check_data_comic     = Popular_comic::where('comic_title', $comic_name)->get();

            //select image for coresponding comic
            $select_comic_image   = Comic::where('comic_title', $comic_name)->get();

            if (count($check_data_comic)) {
                //if data found, don't do anything
            }
            else{

                foreach ($select_comic_image as $select) {
                    $select_image         = $select->comic_image;

                    //if data not found, add comic to database
                    $insert = new Popular_comic();
                    $insert->comic_title    = $comic_name;
                    $insert->comic_image    = $select_image;
                    $insert->counter        = $visit;
                    $insert->save();
                }
            }
        //-------------------------//
        
        //update counter
            $check_comic    = Popular_comic::where('comic_title', $comic_name)->first();

            $check_counter  = Popular_comic::where('comic_title', $comic_name)->first();
                            
            if (count($check_comic)) {
                
                $fiveten_minutes   = date("Y-m-d H:i:s",time()- 15*60);

                $checks        = Popular_comic::where('comic_title', $comic_name)
                                    ->where('updated_at', '>', $fiveten_minutes)->get();

                if (count($checks)) {
                    
                    //if found ip , dont do anyhting 
                   
                }
                else
                {
                    //if not found , then do update
                    $check_comic->counter = $check_counter->counter + 1;
                    $check_comic->update();
                }
            }
            else
            {
                //do nothing
            }

        //------------------------------//

        $single_comic   = DB::table('comics')->where('comic_title',$comic_title)->get();
        $title          = "Bukufi : Detail Comic".' '.str_replace('-', ' ', $comic_title);
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
                $data = 'Google Chrome';
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

        
        $title      = "Bukufi : Read Comic " .$comic_title;
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
        
        $title          = "Bukufi : Comic Status";
        $status         = Comic::where('comic_status', $status)->paginate(15);
        $genres         = DB::table('comic_genres')->limit(10)->orderBy('comic_genre', 'asc')->get();

        $comic_statuses = DB::table('comic_status')->get();

        return view('Front-end/Single/comic_by_status', compact('status', 'genres', 'comic_statuses', 'title'));
    }
}
