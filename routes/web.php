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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');
Route::resource('posts', 'PostsController');
Route::get('email', function () {
    return view('posts.email');
});
Route::get('email', 'MailController@send');
/*
Route::get('/about', function () {
    return view('pages.about');
});*/
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
Route::get('send', 'MailController@send');
Route::post('send', 'MailController@send');
