<?php

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
    Route::get('/user/admin/{id}', 'UsersController@admin')->name('user.admin')->middleware('admin');
    Route::get('/user/not-admin/{id}', 'UsersController@not_admin')->name('user.not-admin');

    Route::get('/user/profile', 'ProfileController@index')->name('user.profile');
    Route::post('/user/profile/update', 'ProfileController@update')->name('user.update');
    Route::get('/user/delete/{id}', 'UsersController@destroy')->name('user.delete');

    Route::get('settings/', 'SettingsController@index')->name('settings');
    Route::post('settings/update', 'SettingsController@update')->name('settings.update');

});

# For testing purposes
Route::group(['prefix' => 'test'], function() {
    Route::get('/', 'TestRouteController@index')->name('test.index');
    Route::post('/store', 'TestRouteController@store')->name('test.store');
});
