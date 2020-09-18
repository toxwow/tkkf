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
Route::get('/artykuły', 'MainController@articles')->name('articles');
Route::get('/artykuł/{id}', 'MainController@singleArticle')->name('article');
Route::get('/sezon-2019-2020', 'MainController@pastSeason')->name('seasonPast');
Route::get('/sezon', 'MainController@season')->name('season');
Route::get('/druzyna/{id}', 'MainController@team')->name('team');

Auth::routes();

Route::get('/panel', 'HomeController@index')->name('panel');


Route::get('/dodaj-artykul', 'ArticlesController@main');

Route::resource('artykuly', 'ArticlesController');
Route::resource('liga', 'LeagueController');
Route::resource('druzyna', 'TeamController');
Route::resource('zawodnik', 'PlayerController');
Route::resource('mecze', 'MatchController');
Route::resource('uzytkownicy', 'UserController');

