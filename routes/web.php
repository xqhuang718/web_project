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

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/recipe','RecipeController');
Route::get('/recipe/create','RecipeController@create');
Route::get('/recipe/{id}','RecipeController@show');
Route::post('recipe','RecipeController@store');
Route::get('/myrecipe','RecipeController@myrecipe');
Route::get('/search','RecipeController@search');
//Comments
Route::post('/recipe/{id}/comment','CommentsController@create');
//upload photo
Route::post('/recipe/image/upload','RecipeController@imageUpload');



Route::get('auth',function(){
  return auth()->user()->id;
});
