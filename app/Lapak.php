<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lapak extends Model
{
    protected $table = 'lapak';
    protected $fillable = ['kode_lapak','nama_lapak','peringkat_lapak','is_delete'];
}
