<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Item;
use App\pilihan;
use App\Provinsi;
use App\Lapak;
use DB;
class HomeController extends Controller
{
	public function index(){
		if (request()->ajax()) {
         return datatables()->of(DB::table('item')
				->join('provinsi', 'item.kode_provinsi','=','provinsi.kode_provinsi')
				->join('pilihan', 'item.kode_pilihan','=','pilihan.kode_pilihan')
				->join('lapak', 'item.kode_lapak','=','lapak.kode_lapak')
	            ->select('item.nama_item', 'item.harga_item', 'provinsi.nama_provinsi', 'pilihan.nama_pilihan', 'lapak.nama_lapak')
	            ->get())->make(true);
     	}

        return view('home');
    }

	// public function index(){            

	// 		$data = DB::table('item')
	// 			->join('provinsi', 'item.kode_provinsi','=','provinsi.kode_provinsi')
	// 			->join('pilihan', 'item.kode_pilihan','=','pilihan.kode_pilihan')
	// 			->join('lapak', 'item.kode_lapak','=','lapak.kode_lapak')
	//             ->select('item.nama_item', 'item.harga_item', 'provinsi.nama_provinsi', 'pilihan.nama_pilihan', 'lapak.nama_lapak')
	//             ->get();

 //        return view('home', compact('data'));
	// }
}
