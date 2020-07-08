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

Route::get('/', 'Admin\DashboardController@index');
Route::get('/login', 'Mahasiswa\LoginController@index');
Route::post('/valid', 'Mahasiswa\LoginController@validator');


Route::prefix('admin')->group(function () {
    Route::get('/', 'Admin\DashboardController@index');
    Route::get('/login', 'Admin\LoginController@index');
    Route::post('/valid', 'Admin\LoginController@validator');
    Route::get('/logout', 'Admin\LoginController@logout');
    Route::prefix('mahasiswa')->group(function () {
        Route::get('/', 'Admin\MahasiswaController@index');
        Route::get('/insert', 'Admin\MahasiswaController@insert');
        Route::get('/update', 'Admin\MahasiswaController@update');
        Route::get('/delete/{nim}', 'Admin\MahasiswaController@delete');
        Route::get('/{nim}', 'Admin\MahasiswaController@show');
    });

});

