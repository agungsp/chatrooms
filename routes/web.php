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
    return view('user');
});

Route::prefix('room')->name('room.')->group(function () {
    Route::get('/', 'RoomController@index')->name('index');
    Route::post('create', 'RoomController@create')->name('create');
});

Route::prefix('rabbit')->name('rabbit.')->group(function () {
    Route::get('publish', 'RabbitController@publish')->name('publish');
    Route::get('consume', 'RabbitController@consume')->name('consume');
});
