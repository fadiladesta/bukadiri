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
//     return view('welcome');
// });

Route::get('/provinsi', function () {
    return view('index_provinsi');
});

Route::get('/','ItemController@index');
Route::post('/item/tambah','ItemController@tambah');
Route::get('/item/ubah/{id}','ItemController@edit');
Route::post('/item/update','ItemController@ubah');
