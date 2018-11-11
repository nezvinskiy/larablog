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

//Route::get('/', function () {
//    return view('welcome');
//});
//
//Auth::routes();

Route::get('/', 'HomeController@index')
    ->name('home')
    ->middleware(['stat']);

Route::resource('category', 'CategoryController')
    ->middleware(['stat']);

Route::resource('post', 'PostController')
    ->middleware(['stat']);

Route::post('/comment/{post}/post', 'CommentController@post')
    ->name('comment.post')
    ->middleware(['stat']);

Route::post('/comment/{category}/category', 'CommentController@category')
    ->name('comment.category')
    ->middleware(['stat']);
