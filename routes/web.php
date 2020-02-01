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

//Route::get('/', function () {
//    return view('pages.index');
//});
Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin')->middleware('auth');
Route::get('/admin/messages', 'admin\ContactController@index')->name('admin.messages')->middleware('auth');
Route::get('/admin/news/photo', 'admin\NewsController@photo')->name('admin.news.photo')->middleware('auth');
Route::get('/admin/news/video', 'admin\NewsController@video')->name('admin.news.video')->middleware('auth');
Route::resource('/admin/news', 'admin\NewsController')->middleware('auth');
Route::resource('/admin/categories', 'admin\CategoriesController')->middleware('auth');

Route::get('/', 'MainController@index')->name('homeroute');
Route::get('/topics', 'TopicController@index')->name('topics');
Route::get('/topic/{id}', 'TopicController@show')->name('topic');
Route::get('/video/{id}', 'TopicController@videoPost')->name('video');
Route::get('/contact', 'ContactController@index')->name('contact');
Route::get('/loginpage', 'LoginController@index')->name('loginpage');


Route::get('/contact/makeseen/{message}', 'admin\ContactController@makeSeen')->name('make.message.seen');

Route::get('/contact/makenew/{message}', 'admin\ContactController@makeNew')->name('make.message.new');
Route::get('/contact/delete/{message}', 'admin\ContactController@delete')->name('message.delete');
Route::post('/contact', 'ContactController@sendMessage')->name('send.message');

Route::get('/news/{news}', 'MainController@singlePost')->name('single.post');

Route::get('/home', 'HomeController@index')->name('home');
