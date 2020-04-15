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
    return view('index');
})->name('index');

Route::group(['prefix' => 'blog'], function() {
    Route::get('', 'BlogController@getBlog')->name('blog');

    Route::get('post/{id}', 'PostController@getPost')->name('blog.post');

    Route::post('post/{id}/like', 'PostController@likePost')->name('blog.post.like');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('', 'AdminController@generateAdminPanel')->name('admin');
    
    Route::post('', 'AdminController@createPost')->name('admin.create');

    Route::post('delete/{id}', 'AdminController@deletePost')->name('admin.delete');

    Route::get('edit/{id}', 'AdminController@generateEditingPage')->name('admin.edit');

    Route::post('edit/{id}', 'AdminController@editPost')->name('admin.edit');

});

Auth::routes();
