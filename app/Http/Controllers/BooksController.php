<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Slider_carousel;
use App\Popular_comic;
use App\Popular_book;
use File;
use Session;
use Illuminate\Support\Facades\Storage;
use DB;

class BooksController extends Controller
{
    //for front end
    public function index()
    {
    	$title 		= "Bukufi : Books";
        /*$books      = Book::orderBy('created_at', 'asc')->limit(4)->get();*/

        $books      = Book::orderBy('created_at', 'asc')->take(4)->get();
        $books2     = DB::table('books')->skip(4)->take(4)->get();

        $carousel   = Slider_carousel::orderBy('created_at', 'desc')->limit(1)->get();
        $carousel2  = Slider_carousel::orderBy('created_at', 'desc')->take(2)->get();
        
        $popular_book_1         = Popular_book::orderBy('counter', 'desc')->take(4)->get();
        $popular_book_2         = Popular_book::orderBy('counter', 'desc')->skip(4)->take(4)->get();

        $popular_comics_1       = Popular_comic::orderBy('counter', 'desc')->take(4)->get();
        $popular_comics_2       = Popular_comic::orderBy('counter', 'desc')->skip(4)->take(4)->get();

        //for new book
        $today          = date("Y-m-d H:i:s");
        $days_3         = time() - (3 * 24 * 60 * 60);  //3 days 24 hours 60 minutes 60 seconds
        $days_3_ago     = date('Y-m-d H:i:s', $days_3);

        $filter         = Book::whereBetween('created_at', [$days_3_ago, $today])->orderBy('created_at', 'desc')->paginate(8);
        
    	return view('Front-end/Book/index', compact('title', 'books', 'books2', 'carousel', 'carousel2', 'popular_book_1', 'popular_book_2', 'popular_comics_1', 'popular_comics_2', 'filter'));
    }

    public function ListBook()
    {
        $title  = "Bukufi : Book List";
    	$books 	= Book::all();

    	return view('Back-end/Book/index', compact('books', 'title'));
    }

    public function bookDetail(Request $request, $bookname)
    {

        //insert data for popular book

            $book_name     = $request->segment(2);
            $visit          = 1;
           
            //first, check comic_title already exist or not
            $check_data_comic     = Popular_book::where('book_title', $book_name)->get();

            //then select image for coresponding comic
            $select_book_image   = Book::where('book_title', $book_name)->first();
            $select_image         = $select_book_image->book_image;

            if (count($check_data_comic)) {
                //if data found, don't do anything
            }
            else{

                //if data not found, add comic to database
                $insert = new Popular_book();
                $insert->book_title    = $book_name;
                $insert->book_image    = $select_image;
                $insert->counter       = $visit;
                $insert->save();
            }
        //-----------//

        //update counter
            $check_comic    = Popular_book::where('book_title', $book_name)->first();

            $check_counter  = Popular_book::where('book_title', $book_name)->first();
                            
            if (count($check_comic)) {
                
                $fiveten_minutes   = date("Y-m-d H:i:s",time()- 15*60);
                
                $checks        = Popular_book::where('book_title', $book_name)
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

        $title          = 'Bukufi : Detail ' .str_replace('-', ' ', $bookname);
        $book_detail    = Book::where('book_title', $bookname)->get();
        
        return view('Front-end/Book/book_detail', compact('title', 'book_detail'));
    }

    public function bookRead($bookname)
    {
        $title      = "Bukufi : Read " . $bookname;
        $epub       = Book::where('book_title', $bookname)->get();
        
        foreach ($epub as $ebook) {
            $epubs  = $ebook->book_file;
        }

        return view('Front-end/Book/read-book', compact('title', 'epubs'));
    }

    public function bookAll()
    {
        $title  = "Bukufi : All Books";

        $carousel   = Slider_carousel::orderBy('created_at', 'desc')->limit(1)->get();
        $carousel2  = Slider_carousel::orderBy('created_at', 'desc')->take(2)->get();

        $list       = Book::all();

        return view('Front-end/Book/all-book', compact('title', 'carousel', 'carousel2', 'list'));

    }

    //end for front end
    //====================//
    //for back-end 

    public function addBook()
    {
        $title  = "Bukufi : Add New Book";

    	return view('Back-end/Book/add-book', compact('title'));
    }

    public function insertBook(Request $request)
    {
    	$this->validate($request, [
            'book_title' 		=> 'required|max:100',
            'book_image'		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'book_file'         => 'required|mimes:epub|max:10240',
            'book_description' 	=> 'required',
            'book_author'      	=> 'required',
            'book_publisher'    => 'required',
            'book_release'     	=> 'required'
        ]);

        $book_cover			= $request->file('book_image');
        $book_cover_name   	= $book_cover->getClientOriginalName();
        $request->file('book_image')->move('theme/book/book_cover/', $book_cover_name);

        $book_file          = $request->file('book_file');
        $book_file_name     = $book_file->getClientOriginalName();
        $request->file('book_file')->move('theme/book/book_files/', $book_file_name);

        $books 		= new Book();
        $books->book_title 			= str_replace(' ', '-', $request->book_title);
        $books->book_image 			= $book_cover_name;
        $books->book_file           = $book_file_name;
        $books->book_description 	= $request->book_description;
        $books->book_author			= str_replace(' ', '-', $request->book_author);
        $books->book_publisher		= str_replace(' ', '-', $request->book_publisher);
        $books->book_release		= $request->book_release;
        $books->save();

        Session::flash('notif', 'Book successfully added.');
        return redirect()->route('list.book');
    }

    public function editBook($id)
    {
        $title     = "Bukufi : Edit Book";
    	$books     = Book::find($id);

    	return view('Back-end/Book/edit-book', compact('books'));
    }

    public function updateBook(Request $request, $id)
    {
    	$this->validate($request, [
            'book_title' 		=> 'required|max:100',
            'book_image'		=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'book_file'         => 'required|mimes:epub|max:10240',
            'book_description' 	=> 'required',
            'book_author'      	=> 'required',
            'book_publisher'    => 'required',
            'book_release'     	=> 'required'
        ]);


        $books 		= Book::where('id', $id)->first();
        $books->book_title 			= str_replace(' ', '-', $request->book_title);

        if ($request->book_image == '') {
        	$books->book_image = $books->book_image;
        }
        else{

        	$image_path = public_path()."\\theme\book\book_cover\\".$books->book_image;
        	$deletes = unlink($image_path);

            $file_path  = public_path()."\\theme\book\book_files\\".$books->book_file;
            $deletes2   = File::delete($file_path);

            if($deletes && $deletes2)
            {
                $file               = $request->file('book_image');
                $filename           = $file->getClientOriginalName();
                $request->file('book_image')->move('theme/book/book_cover', $filename);
                $books->book_image  = $filename;

                $book_file          = $request->file('book_file');
                $book_file_name     = $book_file->getClientOriginalName();
                $request->file('book_file')->move('theme/book/book_files/', $book_file_name);
                $books->book_file   = $book_file_name;

            }

            else{
                Session::flash('notif', 'Book cover not replaced');
                return redirect()->route('list.book');
	        }
        }

        $books->book_description 	= $request->book_description;
        $books->book_author			= str_replace(' ', '-', $request->book_author);
        $books->book_publisher		= str_replace(' ', '-', $request->book_publisher);
        $books->book_release		= $request->book_release;
        $books->update();

        Session::flash('notif', 'Book successfully edited.');
        return redirect()->route('list.book');
    }
    
    public function deleteBook($id)
    {
    	$data = Book::find($id);

        $image_path = public_path()."\\theme\book\book_cover\\".$data->book_image;
        $deletes = unlink($image_path);

        $file_path  = public_path()."\\theme\book\book_files\\".$data->book_file;
        $deletes2   = File::delete($file_path);

        if($deletes && $deletes2)
        {
            $data->delete();
            
            Session::flash('notif', 'Book successfully deleted.');
            return redirect()->route('list.book');
        }
        else{
            return "Cover book doesn't deleted";
        }
    }

    //end for back-end 
}
