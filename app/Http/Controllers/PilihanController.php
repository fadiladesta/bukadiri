<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pilihan;// model akses ke table

class PilihanController extends Controller
{
    public function index(){
    	if (request()->ajax()){
    		return datatables()->of(pilihan::latest()->get())
    		//tombol status
    		->addColumn('status',function($data){
				if ($data->isdelete==0){
				$button= '<button type="button" name="satatus" id="'.$data->kode_pilihan.'" class="btn btn-outline-dark btn-sm">Non Aktifkan</button>';
				$button .="&nbsp;&nbsp;";
				$button	.= '<button type="button" name="satatus" id="'.$data->kode_pilihan.'" class="status btn btn-outline-warning btn-sm">Aktifkan</button>';
				return $button;

				}else{
				$button= '<button type="button" name="satatus" id="'.$data->kode_pilihan.'" class="btn btn-outline-success btn-sm" colspan="2"></button>';
					return $button;
				}
			})

    		//tombol ubah
    		->addColumn('ubah',function($data){
    		$button='<button type="button" id="' .$data->kode_pilihan.'"  name="ubah" class="ubah btn btn-warning btn-sm">Ubah</button>';
				return $button;
    		})

    		//tombol lihat
			->addColumn('lihat',function($data){
				$button='<button type="button" id="' .$data->kode_pilihan.'"name="lihat" class="lihat btn btn-primary btn-sm">Lihat</button>';
				return $button;

			})

			//tombol hapus
			->addColumn('hapus',function($data){
				$button='<button type="button" id="' .$data->kode_pilihan.'" name="hapus" class="hapus btn btn-danger btn-sm">hapus</button>';
				return $button;
			})

    		->rawColumns(array("ubah","status","lihat","hapus"))
			->make(true);
			}
			return view('index_pilihan');
    	}

    	//tombol tambah data
    	public  function tambah(Request $request){
    	$isdelete=1;
    	$form_data = array( // penamaan variable bebas

    		'kode_pilihan' /* nama tabel*/=> $request->kode_pilihan, /*lemparan*/
    		'nama_pilihan'=> $request->nama_pilihan,
    		'diskon_pilihan' => $request->diskon_pilihan,
    		'isdelete' 		=> $isdelete
    	);

    	$kodePil = pilihan::where('kode_pilihan', '=', $request->kode_pilihan)->get();

    	$count = count($kodePil);

    	if ($count== 0) {
    	pilihan::create($form_data); //variable diambil dari variabel di atas
    	return response()->json(['success'=>'Data berhasil ditambah.']);
    	
    	}else{
		return response()->json(['error'=>'Data Telah Ada']);
    	}

		}

		public function ubah(Request $request,$kode_pilihan){
		if ($request->ajax()) {
			$data = pilihan::where('kode_pilihan','=', $kode_pilihan)->get();
			return response()->json(['data'=>$data]);
			}
		}

		public function menambahkan(Request $request)
		{
    	// $isdelete = 1;
        $form_data = array(
    		'nama_pilihan' => $request->nama_pilihan,
    		'diskon_pilihan'		 => $request->diskon_pilihan,
    	);

        $kodepel = pilihan::where('kode_pilihan','=', $request->kode_pilihan)->update($form_data);

    	return response()->json(['success'=>'Data berhasil diupdate.']);

    	}















} // penutup class PilihanController
