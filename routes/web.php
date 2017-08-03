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

//google
$s = 'social.';
Route::get('/social/redirect/google',   
	['as' => $s . 'redirect',   'uses' => 'SocialAuthController@getSocialRedirect']);
Route::get('/social/handle/google',     
	['as' => $s . 'handle',     'uses' => 'SocialAuthController@getSocialHandle']);

//comic status
Route::get('/comic/status/{status}', 'IndexController@comicstatus');

//comic list
/*Route::get('data/comic/list/', 'LatestComicController@getdata')->name('data.comic');*/
Route::get('/comic/list/', 'LatestComicController@index')->name('latest.comic');
Route::post('/comic/list/{alph}', 'LatestComicController@search_alph')->name('sort.comic');
Route::get('/mobile/comic/list/{alph}', 'LatestComicController@search_alph')->name('sort.comic');

//single comic
Route::get('/comic/{comic_title}', 'IndexController@comic');
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

//user
Route::get('login', 'UserLoginController@getUserLogin')->name('user.login');	//user login link
Route::post('login', 'UserLoginController@userAuth')->name('user.auth');
Route::post('user/logout', 'UserLoginController@logout')->name('user.logout');

Route::get('user/register', 'UserregisterController@index')->name('user.register');
Route::post('user/register', 'UserregisterController@store')->name('action.register');

//admin
Route::get('admin/login', 'AdminLoginController@getAdminLogin')->name('admin.login');	//admin login link
Route::post('admin/login', 'AdminLoginController@adminAuth')->name('admin.auth');
Route::post('/logout', 'AdminLoginController@logout')->name('admin.logout');

Route::group(['middleware' => ['admin']], function(){
	//dashboard
	Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');	//admin dashboard

	//administrator
	Route::get('/admin/list', 'AdminListController@index')->name('admin.list');	//admin table
	Route::post('/admin/list', 'AdminListController@store')->name('add.admin');	//add admin 

	//administrator profile
	Route::get('/admin/profile/id/{id}', 'AdminProfileConttroller@index')->name('admin.profile');
	Route::get('/admin/profile/edit/{id}', 'AdminProfileConttroller@edit');
	Route::post('/admin/profile/edit/{id}', 'AdminProfileConttroller@update');

	//comic
	Route::get('/admin/comic/list', 'ComicController@index')->name('comic.list');	//show comic list
	Route::get('/admin/comic/add', 'ComicController@create')->name('comic.add');	//show comic add form
	Route::post('/admin/comic/add', 'ComicController@store')->name('comic.submit');	//submit comic add form
	Route::get('/admin/comic/{id}/edit', 'ComicController@edit')->name('comic.edit');	//edit comic
	Route::patch('/admin/comic/{id}', 'ComicController@update')->name('comic.update');	//update comic
	Route::delete('/admin/comic/{id}', 'ComicController@destroy')->name('comic.delete');	//delete comic

	//comic genre
	Route::get('/admin/comic-genre', 'ComicGenreController@index')->name('comic.genre');
	Route::post('/admin/comic-genre/add', 'ComicGenreController@store')->name('add.genre');
	Route::delete('/admin/comic-genre/delete/{id}', 'ComicGenreController@destroy');

	//comic chapter
	Route::get('/admin/comic-chapter', 'ComicChapterController@index')->name('comic.chapter');
	Route::get('/admin/comic-chapter/{id}', 'ComicChapterController@addChapter')->name('comic.chapter.form');
	Route::post('/admin/comic/{id}/chapter', 'ComicChapterController@store')->name('add.comic.chapter');
	Route::delete('/admin/comic-chapter/delete/{id}', 'ComicChapterController@destroy');
});

Route::group(['middleware' => ['user']], function(){
	//user dashboard
	Route::get('user/dashboard', 'UserController@dashboard')->name('user.dashboard');	//user dashboard

	//bookmark
	Route::get('user/comic-bookmark/{id}', 'UserBookmarkComic@show')->name('user.bookmark.list');
});

/*Auth::routes();*/

/*Route::get('/home', 'HomeController@index')->name('home');*/
