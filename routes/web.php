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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/posts', 'PostController@index')->name('posts');
    Route::get('/post/create', 'PostController@create')->name('post.create');
    Route::post('/post/store', 'PostController@store')->name('post.store');
    Route::get('/post/edit/{id}', 'PostController@edit')->name('post.edit');
    Route::get('/post/destroy/{id}', 'PostController@destroy')->name('post.destroy');
    Route::post('/post/update/{id}', 'PostController@update')->name('post.update');
    Route::get('/post/trashed', 'PostController@trashed')->name('post.trashed');
    Route::get('/post/delete/{id}', 'PostController@delete')->name('post.delete');
    Route::get('/post/restore/{id}', 'PostController@restore')->name('post.restore');

    Route::get('/category/create', 'CategoryController@create')->name('category.create');
    Route::get('/categories', 'CategoryController@index')->name('categories');
    Route::post('/category/store', 'CategoryController@store')->name('category.store');
    Route::get('/category/edit/{id}', 'CategoryController@edit')->name('category.edit');
    Route::post('/category/update/{id}', 'CategoryController@update')->name('category.update');
    Route::get('/category/delete/{id}', 'CategoryController@destroy')->name('category.delete');

    Route::get('/tags', 'TagsController@index')->name('tags'); 
    Route::get('/tag/create', 'TagsController@create')->name('tag.create'); 
    Route::post('/tag/store', 'TagsController@store')->name('tag.store'); 
    Route::get('/tag/edit/{id}', 'TagsController@edit')->name('tag.edit'); 
    Route::post('/tag/update/{id}', 'TagsController@update')->name('tag.update'); 
    Route::get('/tag/delete/{id}', 'TagsController@destroy')->name('tag.delete'); 

    Route::get('/users', 'UsersController@index')->name('users');
    Route::get('/user/create', 'UsersController@create')->name('user.create');
    Route::post('/user/store', 'UsersController@store')->name('user.store');
    Route::get('/user/edit/{id}', 'UsersController@edit')->name('user.edit');
    Route::get('/user/trashed/{id}', 'UsersController@trashed')->name('user.trashed');

});

# For testing purposes
Route::group(['prefix' => 'test'], function() {
    Route::get('/', 'TestRouteController@index')->name('test.index');
    Route::post('/store', 'TestRouteController@store')->name('test.store');
});
