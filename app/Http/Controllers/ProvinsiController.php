<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provinsi; // nama model

class ProvinsiController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
               return datatables()->of(Provinsi::latest()->get())
                       
                        ->addColumn('lihat',function($data){
                            $button = '<button type="button" id="'.$data->kode_provinsi.'"class="detail btn btn-success btn-sm">Detail</button>';
                            return $button;
                        	})
                        ->addColumn('ubah',function($data){
                            $button = '<button type="button" id="'.$data->kode_provinsi.'"class="edit btn btn-primary btn-sm">Edit</button>';
                            return $button;
                            })  
                        ->addColumn('hapus',function($data){
                            if ($data->isdelete==1) {
                            $button = '<button type="button" id="'.$data->kode_provinsi.'"class="delete btn btn-danger btn-sm">Delete</button>';
                            return $button;
                            }else{
                            	
                            }
                           }) 
                            ->addColumn('isdelete',function($data){
                          	if ($data->isdelete==0) {
                          		$button = '<button type="button" id="'.$data->kode_provinsi.'"class="aktif btn btn-info btn-sm">Aktif</button>';
                            return $button;
                          	} else {
                          		$button = '<button type="button" id="'.$data->kode_provinsi.'"class="aktif btn btn-outline-success btn-sm">Aktif</button>'.'  '.'<button type="button" id="'.$data->kode_provinsi.'"class="nonaktif btn btn-outline-info btn-sm">Non Aktif</button>';
                          		 return $button;		
                          	}
                       		 })

                        ->rawcolumns(array("lihat","ubah","hapus","isdelete"))
                        ->make(true);
          }
          return view('index_provinsi');
    }


    //add
    public function add(Request $request){
  	$isdelete = 1; //set value 1
   	$form_data = array(
 		'kode_provinsi' => $request->kode_provinsi,
 		'nama_provinsi' => $request->nama_provinsi,
 		'jumlah_kota_provinsi' => $request->jumlah_kota_provinsi,
 		'isdelete' => $isdelete

 	);

 	$kodeProv =Provinsi::where ('kode_provinsi', '=' ,$request->kode_provinsi)->get();
 	$count = count($kodeProv);

    if ($count==0){ 	
 	Provinsi::create($form_data);
 	return response()->json(['success'=>'Data berhasil ditambah']);
 	
    }else{ 	
 	return response()->json(['errors'=>'Data Sudah Ada']);
    }
 	
    } //penutup Add

    public function edit(Request $request,$id)
    {
        if ($request->ajax()) {
            $data = Provinsi::where('kode_provinsi','=',$request->id)->get();
            return response()->json(['data'=>$data]);
        }
    }

    //Update
    public function update(Request $request){
	
 	$form_data = array(
 		'kode_provinsi' => $request->kode_provinsi,
 		'nama_provinsi' => $request->nama_provinsi,
 		'jumlah_kota_provinsi' => $request->jumlah_kota_provinsi		
 	);

 	$kodeProv = Provinsi::where ('kode_provinsi', '=' ,$request->kode_provinsi)->update($form_data);
 	return response()->json(['success'=>'Data berhasil diupdate']);	
    } //penutup Update

    
    public function lihat(Request $request,$id)
    {
        if ($request->ajax()) {
            $data = Provinsi::where('kode_provinsi','=',$request->id)->get();
            return response()->json(['data'=>$data]);
        }
    }

    public function hapus($id)
    {
      $isdelete=0;
      $form_data=array(
        'isdelete'=> $isdelete
      );
      Provinsi::where('kode_provinsi','=',$id)->update($form_data);
    }

    public function aktif($id)
    {     
      $isdelete = 1;
    $form_data = array(
    'isdelete' => $isdelete
    );

    Provinsi::where ('kode_provinsi', '=' ,$id)->update($form_data);
      }


}
