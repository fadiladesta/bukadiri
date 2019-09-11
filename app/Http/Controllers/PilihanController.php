<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\pilihan;// model akses ke table

class PilihanController extends Controller
{
    public function index(){
    	if (request()->ajax()){
    		return datatables()->of(pilihan::all())
    		//tombol status
    		->addColumn('status',function($data){
				if ($data->isdelete==0){
				$button	= '<button type="button" name="aktifkan" id="'.$data->kode_pilihan.'" class="status btn btn-info btn-sm">Aktifkan</button>';
				$button .="&nbsp;&nbsp;";
				$button .= '<button type="button" name="nonaktif" id="'.$data->kode_pilihan.'" class="btn alert-danger btn-sm">Non Aktif</button>';
				return $button;

				}else{
				$button= '<button type="button" name="aktif id="'.$data->kode_pilihan.'" class=" btn btn-success disabled btn-sm" colspan="2">Aktif</button>';
					return $button;
				}
			})

    		//tombol ubah
    		->addColumn('ubah',function($data){
    		$button='<button type="button" id="' .$data->kode_pilihan.'"  name="ubah" class="ubah btn btn-primary btn-sm">Ubah</button>';
				return $button;
    		})

    		//tombol lihat
			->addColumn('lihat',function($data){
				$button='<button type="button" id="' .$data->kode_pilihan.'"name="lihat" class="lihat btn btn-secondary btn-sm">Lihat</button>';
				return $button;

			})

			//tombol hapus
			->addColumn('hapus',function($data){
				if ($data->isdelete == 1) {
                    $button = '<button type="button" name="hapus" id="'.$data->kode_pilihan.'" class="hapus btn btn-danger btn-sm">Hapus</button>';
                    return $button;
                    
                }else {

                }
			})

    		->rawColumns(array("status","ubah","lihat","hapus"))
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
    		'nama_pilihan' 			=> $request->nama_pilihan,
    		'diskon_pilihan'		 => $request->diskon_pilihan,
    	);

        $kodepel = pilihan::where('kode_pilihan','=', $request->kode_pilihan)->update($form_data);

    	return response()->json(['success'=>'Data berhasil diupdate.']);

    	}

    	public function lihat(Request $request,$kode_pilihan){
			if ($request->ajax()) {
				$data = pilihan::where('kode_pilihan','=',$kode_pilihan)->get();
				return response()->json(['data'=>$data]);
			}
		}


		public function hapus($kode_pilihan){
	    	$isdelete = 0;
	        $form_data = array(
	    		'isdelete'=>$isdelete,
	    		'tanggal_hapus'=>date('Y-d-m H:i:s')
	    	);

	        $kodepel = pilihan::where('kode_pilihan', '=', $kode_pilihan)->update($form_data);

	    	return response()->json(['success'=>'Data berhasil di umpetin.']);

	    }

	    public function status($kode_pilihan){
	    	$isdelete = 1;
	        $form_data = array(
	    		'isdelete'=>$isdelete,
	    		'tanggal_hapus'=>null
	    	);

	        $kodepel = pilihan::where('kode_pilihan',$kode_pilihan)->update($form_data);

	    	return response()->json(['success'=>'Data berhasil di umpetin.']);

    }

















} // penutup class PilihanController
