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
Route::get('/', 'Controller@index');
Route::get('/ims/subscriber/{phonenumber}', 'Controller@get');
Route::put('/ims/subscriber/{phonenumber}', 'Controller@put');
Route::delete('/ims/subscriber/{phonenumber}', 'Controller@delete');
