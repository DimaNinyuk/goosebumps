<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user', 'HomeController@user');
Route::get('/admin', 'HomeController@admin');
Route::get('/author', 'HomeController@author');
Route::get('/admin-setting','ManagementController@index');
Route::post('/loadmusic', 'ManagementController@loadmusic');
Route::get('/admin-setting-roles','ManagementController@setrole');
Route::post('/setroles', 'ManagementController@setroles');
Route::get('/temp', function () {
    return view('temp');
});
Route::get('/genre/{id}','HomeController@genre');
Route::post('/addlike', 'HomeController@addlike');
Route::post('/deletelike', 'HomeController@deletelike');
Route::post('/adddislike', 'HomeController@adddislike');
Route::post('/deletedislike', 'HomeController@deletedislike');
Route::get('/list','HomeController@list');
Route::post('/addcomment', 'HomeController@addcomment');
Route::get('/top','HomeController@top');
Route::get('/author-setting','ManagementController@settingauthor');
Route::post('/deletetrack', 'HomeController@deletetrack');
Route::post('/deletec', 'HomeController@deletec');
Route::get('/exportfile', 'ManagementController@exportfile');