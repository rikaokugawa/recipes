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



Route::group(['prefix' => 'user'], function() {
    Route::get('recipe/create', 'User\RecipeController@add');
    Route::post('recipe/create', 'User\RecipeController@create');
    Route::get('recipe', 'User\RecipeController@index');
    Route::get('recipe/edit', 'User\RecipeController@edit');
    Route::get('recipe/delete', 'User\RecipeController@delete');
    Route::get('menu/create', 'User\MenuController@add');
    Route::post('menu/create', 'User\MenuController@create');
    Route::get('menu/edit', 'User\MenuController@edit'); // 追記
    Route::post('menu/edit', 'User\MenuController@update'); // 追記
    Route::get('menu/delete', 'User\MenuController@delete');
    Route::get('menu','User\MenuController@index');
    //Route::post('profile/create','Admin\ProfileController@create')->middleware('auth');
    //Route::post('profile','Admin\ProfileController@update')->middleware('auth');
    //Route::get('profile/edit','Admin\ProfileController@edit')->middleware('auth');
    //Route::get('profile','Admin\ProfileController@index')->middleware('auth');
    //Route::get('profile/delete','Admin\ProfileController@delete')->middleware('auth');
    //Route::get('profile', 'Admin\ProfileController@index')->middleware('auth'); // 追記
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'TopPageController@index')->name('toppage');
Route::post('/next', 'NextController@index');
