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

Route::get('/home', function () {
    return view('index_pilihan');
});


Route::get('/index_pilihan','PilihanController@index');
Route::post('/pilihan/tambah','PilihanController@tambah');
Route::get('/pilihan/ubah/{id}','PilihanController@ubah');
Route::post('/pilihan/menambahkan','PilihanController@menambahkan');

