<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Item;
use App\pilihan;
use App\Provinsi;
use App\Lapak;

class ItemController extends Controller
{
	public function index(){
    	if (request()->ajax()) {
            return datatables()->of(Item::all())
            ->addColumn('status',function($data){
                	$button = '<button type="button" name="aktif" id="'.$data->kode_item.'" class="aktif btn btn-outline-success btn-sm">Aktifkan</button>';
                	return $button;
            })
            ->addColumn('lihat',function($data){
                $button = '<button type="button" name="lihat" id="'.$data->kode_item.'" class="lihat btn btn-success btn-sm">Lihat</button>';
                return $button;
            })
            ->addColumn('ubah',function($data){
                $button = '<button type="button" name="ubah" id="'.$data->kode_item.'" class="ubah btn btn-primary btn-sm">Ubah</button>';
                return $button;
            })
            ->addColumn('hapus',function($data){
        		$button = '<button type="button" name="hapus" id="'.$data->kode_item.'" class="hapus btn btn-danger btn-sm">Hapus</button>';
            	return $button;
            })
            ->rawColumns(array("status","lihat","ubah","hapus"))
            ->make(true);
        }
        $pilihans 	= pilihan::select('kode_pilihan')->get();
        $provinsis  = Provinsi::select('kode_provinsi')->get();
        $lapaks  	= Lapak::select('kode_lapak')->get();
    	return View::make('index_item')->with('pilihans',$pilihans)->with('provinsis',$provinsis)->with('lapaks',$lapaks);
    }

    // add
    public function tambah(Request $request){
    	$isDelete = 1;
        $lapak = "LA001";
    	$form_data = array(
    		'kode_item' 	 => $request->kode_item,
    		'nama_item' 	 => $request->nama_item,
    		'harga_item'	 => $request->harga_item,
    		'kode_provinsi'	 => $request->kode_provinsi,
    		'kode_pilihan'	 => $request->kode_pilihan,
    		'kode_lapak'	 => $lapak,
    		'isDelete'	 	 => $isDelete
    	);

    	$kodeitem = Item::where('kode_item','=', $request->kode_item)->get();
    	$count = count($kodeitem);

    	if ($count == 1) {
    		return response()->json(['error'=>'Kode Item sudah terpakai']);
    	}else{
    		Item::create($form_data);
    		return response()->json(['success'=>'Data berhasil ditambah.']);
    	}
    }

    public function ubah(Request $request)
    {
        // $isdelete = 1;
        $lapak = "LA001";
        $form_data = array(
            'kode_item'      => $request->kode_item,
            'nama_item'      => $request->nama_item,
            'harga_item'     => $request->harga_item,
            'kode_provinsi'  => $request->kode_provinsi,
            'kode_pilihan'   => $request->kode_pilihan,
            'kode_lapak'     => $lapak
        );

        Item::where('kode_item','=', $request->kode_item)->update($form_data);

        return response()->json(['success'=>'Data berhasil diupdate.']);
    }

    public function edit(Request $request,$id){
        if ($request->ajax()) {
            $data = Item::where('kode_item','=', $request->id)->get();
            return response()->json(['data'=>$data]);
        }
    }
}
