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
//
//Route::get('/', function () {
//    return view('welcome');
//});




Route::get('/', 'DemoController@readItems');
Route::post('addItem', 'DemoController@addItem');
Route::post('editItem', 'DemoController@editItem');
Route::post('deleteItem', 'DemoController@deleteItem');