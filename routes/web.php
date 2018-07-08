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

Route::get('/', 'FilmController@index')->name('home');
  
Route::get('/films/create', 'FilmController@create');

Route::post('/films', 'FilmController@store');

Route::get('/films/{film}', 'FilmController@show');

Route::post('/films/{film}/comments', ['as' => 'film_comments', 'uses' => 'CommentsController@store']);



Route::get('/films/tags/{tag}', 'TagsController@index');


Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');




Route::get('/login', 'SessionsController@create');

Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');