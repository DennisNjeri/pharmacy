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



Auth::routes();

Route::get('/', 'HomeController@index')->name('homeLand');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'ProfileController@createProfile')->name('CreateProfile');
Route::get('/profile', 'ProfileController@viewProfile')->name('viewProfile');
Route::post('/homepost', 'PostController@store')->name('createPost');
Route::get('/posts/{postId}', 'PostController@show')->name('ViewPost');
Route::get('/deleteposts/{postId}', 'PostController@destroy')->name('deletePost');
?>