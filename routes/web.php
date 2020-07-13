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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/forum', 'HomeController@index')->name('home');

/*Routes of social login*/
Route::get('login/google', 'Auth\LoginController@redirectToProvider')->name('social.auth');
Route::get('/google/redirect', 'Auth\LoginController@handleProviderCallback');

/* Route of channels creation deletion update   */

Route::resource('channels','ChannelsController');


/* Route of discussion creation deletion update   */

Route::resource('discussions','DiscussionsController');

/*..Showing discussion page..*/

Route::get('/discussion/{slug}','DiscussionsController@show')->name('discussions');

/* Handlign reply***/

Route::post('/discussion/reply/{id}','ReplyHandlingController@reply')->name('discussion.reply');
/* Handlign bestreply***/
Route::get('/discussion/best/reply/{id}','ReplyHandlingController@best_answer')->name('discussion.bestanswer');
/* Filtering by channel name***/
Route::get('/channel/{slug}','DiscussionsController@channel')->name('channel');