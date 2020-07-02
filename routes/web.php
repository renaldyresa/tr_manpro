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


Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\DashboardController@index');
    Route::prefix('mahasiswa')->group(function () {
        Route::get('/', 'Admin\MahasiswaController@index');
        Route::get('/insert', 'Admin\MahasiswaController@insert');
        Route::get('/update', 'Admin\MahasiswaController@update');
        Route::get('/delete/{nim}', 'Admin\MahasiswaController@delete');
        Route::get('/{nim}', 'Admin\MahasiswaController@show');
    });

});

