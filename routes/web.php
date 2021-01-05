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
use App\Http\Controllers\SubMenuController;

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
Route::view('/ccc', 'ccc');
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
    Route::get('/submenu/{menu_id}', 'SubMenuController@index');


    //post
    Route::post('/title', 'TitleController@store');
    Route::post('/ad', 'AdController@store');
    Route::post('/image', 'ImageController@store');
    Route::post('/mvim', 'MvimController@store');
    Route::post('/total', 'TotalController@store');
    Route::post('/bottom', 'BottomController@store');
    Route::post('/news', 'NewsController@store');
    Route::post('/admin', 'AdminController@store');
    Route::post('/menu', 'MenuController@store');
    Route::post('/submenu/{menu_id}', 'SubMenuController@store');


    //update
    Route::patch('/title/{id}', 'TitleController@update');
    Route::patch('/ad/{id}', 'AdController@update');
    Route::patch('/image/{id}', 'ImageController@update');
    Route::patch('/mvim/{id}', 'MvimController@update');
    Route::patch('/total/{id}', 'TotalController@update');
    Route::patch('/bottom/{id}', 'BottomController@update');
    Route::patch('/news/{id}', 'NewsController@update');
    Route::patch('/admin/{id}', 'AdminController@update');
    Route::patch('/menu/{id}', 'MenuController@update');
    Route::patch('/submenu/{id}', 'SubMenuController@update');    

    //delete
    Route::delete('/title/{id}', 'TitleController@destroy');
    Route::delete('/ad/{id}', 'AdController@destroy');
    Route::delete('/image/{id}', 'ImageController@destroy');
    Route::delete('/mvim/{id}', 'MvimController@destroy');
    Route::delete('/news/{id}', 'NewsController@destroy');
    Route::delete('/admin/{id}', 'AdminController@destroy');
    Route::delete('/menu/{id}', 'MenuController@destroy');
    Route::delete('/submenu/{id}', 'SubMenuController@destroy');    


    //show
    Route::patch('/title/sh/{id}', 'TitleController@display');
    Route::patch('/ad/sh/{id}', 'AdController@display');
    Route::patch('/image/sh/{id}', 'ImageController@display');
    Route::patch('/mvim/sh/{id}', 'MvimController@display');
    Route::patch('/news/sh/{id}', 'NewsController@display');
    Route::patch('/menu/sh/{id}', 'MenuController@display');

});

Route::prefix('modals')->group(function () {

    //modals
    Route::get('/addTitle', 'TitleController@create');
    Route::get('/addAd', 'AdController@create');
    Route::get('/addImage', 'ImageController@create');
    Route::get('/addMvim', 'MvimController@create');
    Route::get('/addNews', 'NewsController@create');
    Route::get('/addAdmin', 'AdminController@create');
    Route::get('/addMenu', 'MenuController@create');
    Route::get('/addSubMenu/{menu_id}', 'SubMenuController@create');

    //edit
    Route::get('/title/{id}', 'TitleController@edit');
    Route::get('/ad/{id}', 'AdController@edit');
    Route::get('/image/{id}', 'ImageController@edit');
    Route::get('/mvim/{id}', 'MvimController@edit');
    Route::get('/total/{id}', 'TotalController@edit');
    Route::get('/bottom/{id}', 'BottomController@edit');
    Route::get('/news/{id}', 'NewsController@edit');
    Route::get('/admin/{id}', 'AdminController@edit');
    Route::get('/menu/{id}', 'MenuController@edit');
    Route::get('/submenu/{id}', 'SubMenuController@edit');    

});



