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


// Route::get('/home', function () {
//     return view('index_pilihan');
// });
// Route::get('/', function () {

//     return view('home');
// });

Route::get('/pengaturan', function () {
    return view('setting');
});

Route::get('/','HomeController@index');

Route::get('/item','ItemController@index');
Route::post('/item/tambah','ItemController@tambah');
Route::get('/item/ubah/{id}','ItemController@edit');
Route::get('/item/lihat/{id}','ItemController@lihat');
Route::get('/item/hapus/{id}','ItemController@hapus');
Route::get('/item/aktif/{id}','ItemController@aktif');
Route::post('/item/update','ItemController@ubah');
//     return view('index_lapak');
// });

Route::get('/lapak', 'LapakController@index');
Route::post('/lapak/add','LapakController@add');
Route::get('/lapak/lihat/{id}', 'LapakController@lihat');
Route::get('/lapak/edit/{id}', 'LapakController@edit');
Route::post('/lapak/update', 'LapakController@ubah');

Route::get('/provinsi','ProvinsiController@index');
Route::post('/provinsi/add','ProvinsiController@add');
Route::get('/provinsi/edit/{id}','ProvinsiController@edit');
Route::post('/provinsi/update','ProvinsiController@update');
Route::get('/provinsi/detail/{id}','ProvinsiController@lihat');
Route::get('/provinsi/hapus/{id}','ProvinsiController@hapus');
Route::get('/provinsi/aktif/{id}','ProvinsiController@aktif');


Route::get('/pilihan','PilihanController@index');
Route::post('/pilihan/tambah','PilihanController@tambah');
Route::get('/pilihan/ubah/{id}','PilihanController@ubah');
Route::post('/pilihan/menambahkan','PilihanController@menambahkan');

