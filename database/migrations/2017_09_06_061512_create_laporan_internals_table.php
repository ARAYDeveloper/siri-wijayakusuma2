<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaporanInternalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_internals', function (Blueprint $table) {
            $table->increments('id');
            $table->char('tahun', 5);
            $table->char('bulan', 2);
            $table->string('nama_kamar');
            $table->integer('pasien_masuk')->default(0);
            $table->integer('pasien_keluar')->default(0);
            $table->integer('hr_perawatan')->default(0);
            $table->integer('lm_perawatan')->default(0);
            $table->integer('jml_tt')->default(0);
            $table->integer('periode')->default(0);
            $table->integer('mati_lebih_48')->default(0);
            $table->integer('mati_kurang_48')->default(0);
            $table->integer('id_riwayats')->default(0);
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
        Schema::dropIfExists('laporan_internals');
    }
}
