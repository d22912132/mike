<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TitleController;
use App\Http\Controllers\AdController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\MvimController;
use App\Http\Controllers\TotalController;
use App\Http\Controllers\BottomController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MenuController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return "Hi~";
// });
Route::view('/', 'home');
Route::redirect('/admin', '/admin/title');
Route::prefix('admin')->group(function () {
    //get
    Route::get('/title', 'TitleController@index');
    Route::get('/ad', 'AdController@index');
    Route::get('/image', 'ImageController@index');
    Route::get('/mvim', 'MvimController@index');
    Route::get('/total', 'TotalController@index');
    Route::get('/bottom', 'BottomController@index');
    Route::get('/news', 'NewsController@index');
    Route::get('/admin', 'AdminController@index');
    Route::get('/menu', 'MenuController@index');

    //post
    Route::post('/title', 'TitleController@store');
    Route::post('/ad', 'AdController@store');
    Route::post('/image', 'ImageController@store');
    Route::post('/mvim', 'MvimController@store');
    Route::post('/news', 'NewsController@store');
    Route::post('/admin', 'AdminController@store');
    Route::post('/menu', 'MenuController@store');

    //update
    Route::patch('/title/{id}', 'TitleController@update');
    Route::patch('/ad/{id}', 'AdController@update');


    //delete
    Route::delete('/title/{id}', 'TitleController@destroy');
    Route::delete('/ad/{id}', 'AdController@destroy');


    //show
    Route::patch('/title/sh/{id}', 'TitleController@display');
    Route::patch('/ad/sh/{id}', 'AdController@display');


});
//modals

Route::get('/modals/addTitle', 'TitleController@create');
Route::get('/modals/addAd', 'AdController@create');

//edit
Route::get('/modals/title/{id}', 'TitleController@edit');
Route::get('/modals/ad/{id}', 'AdController@edit');





