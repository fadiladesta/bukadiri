<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePilihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilihan', function (Blueprint $table) {
            $table->string('kode_pilihan',5);
            $table->primary('kode_pilihan');
            $table->string('nama_pilihan');
            $table->integer('diskon_pilihan')->nullable(true);
            $table->integer('isdelete');
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
        Schema::dropIfExists('pilihan');
    }
}
