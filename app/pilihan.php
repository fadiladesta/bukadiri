<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pilihan extends Model
{
	protected $table = 'pilihan'
    protected $fillable = ['kode_pilihan','nama_pilihan','diskon_pilihan','isdelete']; // column table database
   //coloumn selain create_at update_at
}
