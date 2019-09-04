<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvinsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinsi', function (Blueprint $table) {
            $table->primary('kode_provinsi');
            $table->string('kode_provinsi',5);
            $table->string('nama_provinsi');
            $table->integer('jumlah_kota_provinsi');
            $table->integer('isdelete');
            $table->dateTime('tanggal_hapus'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provinsi');
    }
}
