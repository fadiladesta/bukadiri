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

<<<<<<< HEAD
Route::get('/home', function () {
    return view('index_pilihan');
=======
// Route::get('/', function () {
<<<<<<< HEAD
//     return view('welcome');
// });

Route::get('/provinsi', function () {
    return view('index_provinsi');
>>>>>>> 61de0ec7d7d17ade823a5c0f95dfdfe784c4eea9
});

Route::get('/','ItemController@index');
Route::post('/item/tambah','ItemController@tambah');
Route::get('/item/ubah/{id}','ItemController@edit');
Route::post('/item/update','ItemController@ubah');
=======
//     return view('index_lapak');
// });

Route::get('/', 'LapakController@index');
Route::post('/lapak/add','LapakController@add');
Route::get('/lapak/lihat/{id}', 'LapakController@lihat');
Route::get('/lapak/edit/{id}', 'LapakController@edit');
Route::post('/lapak/update', 'LapakController@ubah');

Route::get('/provinsi','ProvinsiController@index');
Route::post('/provinsi/add','ProvinsiController@add');
Route::get('/provinsi/edit/{id}','ProvinsiController@edit');
Route::post('/provinsi/update','ProvinsiController@update');



<<<<<<< HEAD
Route::get('/index_pilihan','PilihanController@index');
Route::post('/pilihan/tambah','PilihanController@tambah');
Route::get('/pilihan/ubah/{id}','PilihanController@ubah');
Route::post('/pilihan/menambahkan','PilihanController@menambahkan');

=======
>>>>>>> b52cac8ba70417f6f8329d9f78374e831415fbbf
>>>>>>> 61de0ec7d7d17ade823a5c0f95dfdfe784c4eea9
