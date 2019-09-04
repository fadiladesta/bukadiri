<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';
    protected $fillable = ['kode_item','nama_item','harga_item','kode_provinsi','kode_pilihan','kode_lapak','isDelete'];
}
