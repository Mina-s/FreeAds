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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/salut', function () {
    return view('index');
});

Route::get('/', 'IndexController@showIndex');
// Route::get('/index', ['controller' => 'index', 'action' => 'showIndex']);
Route::get('form','FormController@create')->name('form.create');
Route::get('form','FormController@store')->name('form.store');
//profile
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
// Route::get('user','UserController@index')->name('user.index');
Route::get('user/{id}/edit','UserController@edit')->name('user.edit');
Route::get('user/{id}/show','UserController@show')->name('user.show');
Route::post('user/{id}/update','UserController@update')->name('user.update');
Route::post('user/{id}/destroy','UserController@destroy')->name('user.destroy');
// //annonces
// Route::get('annonces','AnnoncesController@index')->name('annonces.index');
Route::get('annonces/create','AnnoncesController@create')->name('annonces.create');
Route::post('annonces/store','AnnoncesController@store')->name('annonces.store');
Route::get('annonces/list','AnnoncesController@list')->name('annonces.list');
Route::get('annonces/{id}/show','AnnoncesController@show')->name('annonces.show');
Route::get('annonces/{id}/mesannonces','AnnoncesController@mesannonces')->name('annonces.mesannonces');


Route::get('annonces/{id}/edit','AnnoncesController@edit')->name('annonces.edit');
Route::post('annonces/{id}/update','AnnoncesController@update')->name('annonces.update');
Route::post('annonces/{id}/destroy','AnnoncesController@destroy')->name('annonces.destroy');
//search
Route::post('annonces/search', 'AnnoncesController@search')->name('annonces.search');
Auth::routes(['verify' => true]);


