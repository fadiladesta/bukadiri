<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->string('kode_item', 5);
            $table->primary('kode_item');
            $table->string('nama_item');
            $table->string('harga_item')->nullable(true);
            $table->string('kode_provinsi', 5);
            $table->string('kode_pilihan', 5);
            $table->string('kode_lapak', 5);
            $table->foreign('kode_provinsi')->references('kode_provinsi')->on('provinsi');
            $table->foreign('kode_pilihan')->references('kode_pilihan')->on('pilihan');
            $table->foreign('kode_lapak')->references('kode_lapak')->on('lapak');
            $table->integer('isDelete');
            $table->dateTime('tanggal_hapus')->nullable(true);
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
        Schema::dropIfExists('item');
    }
}
