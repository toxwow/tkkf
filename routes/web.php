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

Route::get('/', 'MainController@index')->name('main');
Route::get('/wiadomosci', 'MainController@articles')->name('articles');

Auth::routes();

Route::get('/panel', 'HomeController@index')->name('panel');


Route::get('/dodaj-artykul', 'ArticlesController@main');

Route::resource('artykuly', 'ArticlesController');
Route::resource('liga', 'LeagueController');
Route::resource('druzyna', 'TeamController');
Route::resource('zawodnik', 'PlayerController');
Route::resource('mecze', 'MatchController');

