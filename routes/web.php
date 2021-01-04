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
    return view('welcome');
});

Route::resource('products', App\HTTP\Controllers\ProductController::class);
Route::resource('stores', App\HTTP\Controllers\StoreController::class);

// Route::get('products', 'App\HTTP\Controllers\ProductController@index');
// Route::get('stores', 'App\HTTP\Controllers\StoreController@index');
