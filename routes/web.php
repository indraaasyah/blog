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

use Illuminate\Support\Facades\Route;
// use Illuminate\Routing\Route;

Auth::routes();

Route::get('/', 'BlogController@index');

Route::get('/post-content/{slug}', 'BlogController@post_content')->name('blog.content');
Route::get('/list-post', 'BlogController@list_content')->name('blog.list');
Route::get('/list-category/{category}', 'BlogController@list_category')->name('blog.category'); //{category} --> nama model
Route::get('/search', 'BlogController@search')->name('blog.search'); //{category} --> nama model


Route::group(['middleware' => 'auth'], 
    function(){
        Route::get('/home', 'HomeController@index')->name('home');
        
        Route::get('/post/show_deleted', 'PostController@show_deleted')->name('post.show_deleted');
        Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');
        Route::delete('/post/kill/{id}', 'PostController@kill')->name('post.kill');
        Route::resource('/post', 'PostController');
        
        Route::resource('/category', 'CategoryController');
        Route::resource('/tag', 'TagController');
        Route::resource('/user', 'UserController');
    });


