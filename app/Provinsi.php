<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
   protected $table = 'provinsi'; //namatable

    //untuk mengatasi masalah mass_asigment
    protected $fillable = ['kode_provinsi','nama_provinsi','jumlah_kota_provinsi','isdelete',]; //column, selain create_at update_at
}
