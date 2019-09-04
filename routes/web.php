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
//     return view('index_lapak');
// });

Route::get('/', 'LapakController@index');
Route::post('/lapak/add','LapakController@add');
Route::get('/lapak/lihat/{id}', 'LapakController@lihat');
Route::get('/lapak/edit/{id}', 'LapakController@edit');
Route::post('/lapak/update', 'LapakController@ubah');


