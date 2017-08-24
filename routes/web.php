<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//home page
Route::get('/', 'IndexController@index')->name('home.index');

//facebook socialite
Route::get('login/facebook', 'SocialAuthController@redirectToProvider');
Route::get('login/facebook/callback', 'SocialAuthController@handleProviderCallback');

//google socialite
$s = 'social.';
Route::get('/social/redirect/google',   
	['as' => $s . 'redirect',   'uses' => 'SocialAuthController@getSocialRedirect']);
Route::get('/social/handle/google',     
	['as' => $s . 'handle',     'uses' => 'SocialAuthController@getSocialHandle']);

//error reporting
Route::post('error-reporting/send-error', 'ErrorReportingController@sendError')->name('send.error');
Route::post('error-reporting/send-error-book', 'ErrorReportingController@sendErrorBook')->name('send.error.book');
Route::post('error-reporting/send-error-comic', 'ErrorReportingController@sendErrorComic')->name('send.error.comic');

//books
Route::get('books/all', 'BooksController@bookAll')->name('book.all');
Route::get('books', 'BooksController@index')->name('books');
Route::get('books/{bookname}', 'BooksController@bookDetail')->name('book.detail');
Route::get('books/read/{bookname}', 'BooksController@bookRead');

//comic status
Route::get('/comic/status/{status}', 'IndexController@comicstatus');

//comic list
Route::get('/comics', 'LatestComicController@front_comic')->name('comics');
Route::get('/comics/list/', 'LatestComicController@index')->name('latest.comic');
Route::post('/comic/list/{alph}', 'LatestComicController@search_alph')->name('sort.comic');
Route::get('/mobile/comic/list/{alph}', 'LatestComicController@search_alph')->name('sort.comic');

//single comic
Route::get('/comics/{comic_title}', 'IndexController@comic')->name('single.comic');
Route::get('/show/comic/{comic_title}/{comic_chapter}/', 'IndexController@showComic')->name('shows');

//single genre
Route::get('/comics/genre', 'SingleGenreController@index')->name('single.genre');
Route::get('/comic-genre/{comic_genre}', 'SingleGenreController@show')->name('satu');

//single author
Route::get('/comics/comic-author', 'SingleAuthorController@index')->name('single.author');
Route::get('/comic/comic-author/name/{comic_author}', 'SingleAuthorController@author')->name('author');

//search
Route::get('keyword', 'SearchController@index')->name('search.form');

//bookmark
Route::get('bookmark/user/{id}', 'UserBookmarkComic@user_bookmark')->name('user.bookmarks');
Route::post('bookmark/user/add/{id}', 'UserBookmarkComic@store')->name('add.bookmarks');

//user login and auth
Route::get('login', 'UserLoginController@getUserLogin')->name('user.login');	//user login link
Route::post('login', 'UserLoginController@userAuth')->name('user.auth');
Route::post('user/logout', 'UserLoginController@logout')->name('user.logout');

Route::get('user/register', 'UserregisterController@index')->name('user.register');
Route::post('user/register', 'UserregisterController@store')->name('action.register');

//admin login and auth
Route::get('admin/login', 'AdminLoginController@getAdminLogin')->name('admin.login');	//admin login link
Route::post('admin/login', 'AdminLoginController@adminAuth')->name('admin.auth');
Route::post('/logout', 'AdminLoginController@logout')->name('admin.logout');

Route::group(['middleware' => ['admin'], 'prefix' => 'admin/'], function(){
	//dashboard
	Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');	//admin dashboard

	//administrator
	Route::get('list', 'AdminListController@index')->name('admin.list');	//admin table
	Route::post('list', 'AdminListController@store')->name('add.admin');	//add admin 

	//books
	Route::get('book', 'BooksController@ListBook')->name('list.book');
	Route::get('book/add', 'BooksController@addBook')->name('add.book');
	Route::post('book/insert', 'BooksController@insertBook')->name('add.to.db.book');
	Route::get('book/edit/{id}', 'BooksController@editBook')->name('edit.book');
	Route::patch('book/{id}', 'BooksController@updateBook')->name('update.book');
	Route::delete('book/{name}', 'BooksController@deleteBook')->name('delete.book');

	//administrator profile
	Route::get('profile/id/{id}', 'AdminProfileConttroller@index')->name('admin.profile');
	Route::get('profile/edit/{id}', 'AdminProfileConttroller@edit');
	Route::post('profile/edit/{id}', 'AdminProfileConttroller@update');

	//comic
	Route::get('comic/list', 'ComicController@index')->name('comic.list');	//show comic list
	Route::get('comic/add', 'ComicController@create')->name('comic.add');	//show comic add form
	Route::post('comic/add', 'ComicController@store')->name('comic.submit');	//submit comic add form
	Route::get('comic/{id}/edit', 'ComicController@edit')->name('comic.edit');	//edit comic
	Route::patch('comic/{id}', 'ComicController@update')->name('comic.update');	//update comic
	Route::delete('comic/{id}/{name}', 'ComicController@destroy')->name('comic.delete');	//delete comic

	//comic genre
	Route::get('comic-genre', 'ComicGenreController@index')->name('comic.genre');
	Route::post('comic-genre/add', 'ComicGenreController@store')->name('add.genre');
	Route::delete('comic-genre/delete/{id}', 'ComicGenreController@destroy');

	//comic chapter
	Route::get('comic-chapter', 'ComicChapterController@index')->name('comic.chapter');
	Route::get('comic-chapter/{id}', 'ComicChapterController@addChapter')->name('comic.chapter.form');
	Route::post('comic/{id}/chapter', 'ComicChapterController@store')->name('add.comic.chapter');
	Route::delete('comic-chapter/delete/{comic_nm}/{title}', 'ComicChapterController@destroy');

	//slider carousel
	Route::get('slider', 'SliderController@index')->name('slider');
	Route::post('slider/add', 'SliderController@insertSlider')->name('slider.insert');
	Route::delete('slider/delete/{id}', 'SliderController@deleteSlider')->name('slider.delete');

});

Route::group(['middleware' => ['user']], function(){
	//user dashboard
	Route::get('user/dashboard', 'UserController@dashboard')->name('user.dashboard');	//user dashboard

	//bookmark
	Route::get('user/comic-bookmark/{id}', 'UserBookmarkComic@show')->name('user.bookmark.list');

	//paypal
	Route::get('checkout', 
				array('as' => 'paypal.paywithpaypal','uses' => 'UserController@payWithPaypal',)); 
	Route::post('paypal', 
				array('as' => 'paypal.paypal','uses' => 'UserController@postPaymentWithpaypal',));
	Route::get('paypal/getstatus', 
				array('as' => 'payment.status','uses' => 'UserController@getPaymentStatus',));

});

/*Auth::routes();*/

/*Route::get('/home', 'HomeController@index')->name('home');*/
