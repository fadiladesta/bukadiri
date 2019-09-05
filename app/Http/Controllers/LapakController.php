<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lapak;

class LapakController extends Controller
{
    public function index()
    {
    	if (request()->ajax()) {
            return datatables()->of(Lapak::all())
	            ->addColumn('status',function($data){
	            	if ($data->is_delete==0) {
	            		$button = '<button type="button"
	            		name="status" id="'.$data->kode_lapak.'"
	            		class="status btn btn-info
	            		btn-sm">Aktifkan</button>';
	            		$button .= "&nbsp;&nbsp;";
	            		$button .= '<button type="button"
	            		name="status" id="'.$data->kode_lapak.'"
	            		class="btn alert-danger
	            		btn-sm">NonAktif</button>';
	            		return $button;
	            	}else{
	            		$button = '<button type="button"
	            		name="status" id="'.$data->kode_lapak.'"
	            		class="btn alert-success
	            		btn-sm">Aktif</button>';
	            		return $button;
	            	}
	            	
	            })
	            ->addColumn('lihat',function($data){
	            	$button = '<button type="button" 
	                    name="lihat" id="'.$data->kode_lapak.'"
	                    class="lihat btn btn-secondary
	                    btn-sm">Lihat</button>';
                	return $button;

	            })
	            ->addColumn('ubah',function($data){
	                $button = '<button type="button" 
	                    name="ubah" id="'.$data->kode_lapak.'" 
	                    class="ubah btn btn-primary
	                    btn-sm">Ubah</button>';
	            	return $button;
	            })
                // $button .= "&nbsp;&nbsp;";
	            ->addColumn('hapus',function($data){
	            	if ($data->is_delete==1) {
	            		$button = '<button type="button" 
	                    name="hapus" id="'.$data->kode_lapak.'"
	                    class="hapus btn btn-danger
	                    btn-sm">Hapus</button>';
	                return $button;
	            	}
	            })  
                // $button .= "&nbsp;&nbsp;";
            ->rawColumns(array("status","lihat","ubah","hapus"))
            ->make(true);
		}
		return view('index_lapak');

    }

    //add
    public function add(Request $request){
    	$is_delete = 1;
    	$form_data = array(
    			'kode_lapak' => $request->kode_lapak,
    			'nama_lapak' => $request->nama_lapak,
    			'peringkat_lapak' => $request->peringkat_lapak,
    			'is_delete' => $is_delete,
    	);
    	$kode = Lapak::where('kode_lapak','=', $request->kode_lapak)->get();

    	$count = count($kode);
    	if ($count == 1) {
    		return response()->json(['errors' => 'Data Sudah Ada.']);
    	}else{
    	Lapak::create($form_data);
    		return response()->json(['success' => 'Data Berhasil Ditambah.']);
    	}
	}

	public function lihat(Request $request,$kode_lapak){
		if ($request->ajax()){
            $data = Lapak::where('kode_lapak','=', $kode_lapak)->get();
            return response()->json(['data'=>$data]);
        }
	}

	public function edit(Request $request, $kode_lapak)
	{
		if ($request->ajax()){
            $data = Lapak::where('kode_lapak','=', $kode_lapak)->get();
            return response()->json(['data'=>$data]);
        }
	}

	public function ubah(Request $request)
	{
		$form_data = array(
    		'nama_lapak' => $request->nama_lapak,
    		'peringkat_lapak'		 => $request->peringkat_lapak,
        );

   		$kode = Lapak::where('kode_lapak','=', $request->kode_lapak)->update($form_data);

    	return response()->json(['success'=>'Data is Successfully Updated.']);
	}

	public function hapus($kode_lapak)
    {
    	$is_delete = 0;
    	$form_data = array(
            'is_delete' => $is_delete,
        );
  		$kode_pel = Lapak::where('kode_lapak','=', $kode_lapak)->update($form_data);
    	return response()->json(['success' => 'Data Berhasil Dihapus.']);
    	
    }

    public function status($kode_lapak)
    {
    	$is_delete = 1;
    	$form_data = array(
            'is_delete' => $is_delete,
        );
  		$kode_pel = Lapak::where('kode_lapak','=', $kode_lapak)->update($form_data);
    	return response()->json(['success' => 'Data Berhasil Diaktifkan.']);
    	
    }             
}