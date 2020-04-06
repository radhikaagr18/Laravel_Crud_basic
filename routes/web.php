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
//     return view('products');
// });
Route::get('/', 'ProductController@index');
Route::post('crud', 'ProductController@upload');
Route::get('crud/edit/{id}','ProductController@edit');
Route::patch('crud/update/{id}','ProductController@update');
Route::delete('crud/delete/{id}','ProductController@destroy');
