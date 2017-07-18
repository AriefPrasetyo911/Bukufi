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

//latest comic
Route::get('/comic/latest', 'LatestComicController@index')->name('latest.comic');

//single comic
Route::get('/comic/{id}/{comic_title}', 'IndexController@comic');

//single genre
Route::get('/comic/genre', 'SingleGenreController@index')->name('single.genre');
Route::get('/comic-genre/{comic_genre}', 'SingleGenreController@show')->name('satu');

//single author
Route::get('/comic/comic-author', 'SingleAuthorController@index')->name('single.author');
Route::get('/comic/comic-author/name/{comic_author}', 'SingleAuthorController@author')->name('author');

Route::group(['middleware' => ['web']], function(){
	//user
	Route::get('login', 'UserLoginController@getUserLogin');	//user login link
	Route::post('login', 'UserLoginController@userAuth')->name('user.auth');

	//admin
	Route::get('admin/login', 'AdminLoginController@getAdminLogin')->name('admin.login');	//admin login link
	Route::post('admin/login', 'AdminLoginController@adminAuth')->name('admin.auth');
	Route::post('/logout', 'AdminLoginController@logout')->name('admin.logout');
});

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
	Route::get('user/dashboard', 'UserController@dashboard')->name('user.dashboard');	//user dashboard
});