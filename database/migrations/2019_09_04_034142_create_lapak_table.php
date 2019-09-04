<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLapakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lapak', function (Blueprint $table) {
            $table->string('kode_lapak', 5)->nullable(false);
            $table->primary('kode_lapak');
            $table->string('nama_lapak')->nullable(false);
            $table->integer('peringkat_lapak');
            $table->integer('is_delete')->nullable(false);
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
        Schema::dropIfExists('lapak');
    }
}
