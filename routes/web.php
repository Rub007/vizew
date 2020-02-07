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

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('admin')->middleware('auth');
    Route::get('/messages', 'admin\ContactController@index')->name('admin.messages')->middleware('auth');
    Route::get('/news/photo', 'admin\NewsController@photo')->name('admin.news.photo')->middleware('auth');
    Route::get('/news/video', 'admin\NewsController@video')->name('admin.news.video')->middleware('auth');
    Route::resource('/news', 'admin\NewsController')->middleware('auth');
    Route::resource('/categories', 'admin\CategoriesController')->middleware('auth');

});


Route::get('/', 'MainController@index')->name('homeroute');

Route::get('/news', 'NewsController@index')->name('news');

Route::get('/topic/{id}', 'NewsController@show')->name('topic');

Route::get('/video/{id}', 'NewsController@videoPost')->name('video');

Route::get('/contact', 'ContactController@index')->name('contact');

Route::get('/loginpage', 'LoginController@index')->name('loginpage');

Route::get('/contact/makeseen/{message}', 'admin\ContactController@makeSeen')->name('make.message.seen');

Route::get('/contact/makenew/{message}', 'admin\ContactController@makeNew')->name('make.message.new');

Route::get('/contact/delete/{message}', 'admin\ContactController@delete')->name('message.delete');

Route::post('/contact', 'ContactController@sendMessage')->name('send.message');

Route::get('/news/{news}', 'SinglePostController@index')->name('single.post');

Route::post('/news/{news}', 'CommentsController@store')->name('add.comment');

Route::get('/categories/{category}', 'CategoriesController@index')->name('user.categories.index');

Route::get('/home', 'HomeController@index')->name('home');
