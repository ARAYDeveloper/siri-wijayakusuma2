<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiwayatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pasien')->unsigned();
            $table->integer('id_kamar')->unsigned();
            $table->integer('id_pembayaran')->unsigned();
            $table->string('no_asuransi')->nullable();
            $table->integer('id_diagnosis')->unsigned();
            $table->dateTime('tgl_masuk');
            $table->dateTime('tgl_lapor');
            $table->dateTime('tgl_keluar')->nullable();
            $table->integer('pindah_dari')->unsigned()->nullable();
            $table->integer('pindah_ke')->unsigned()->nullable();
            $table->enum('pulang_paksa', ['Ya', 'Tidak']);
            $table->integer('jumlah_hari_perawatan')->nullable();
            $table->integer('jumlah_lama_perawatan')->nullable();
            $table->enum('status_keluar', ['Meninggal', 'Hidup', 'Dirujuk']);
            $table->integer('id_rumah_sakit_rujuks')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('id_pasien')->references('id')->on('pasiens');
            $table->foreign('id_kamar')->references('id')->on('kamars');
            $table->foreign('id_pembayaran')->references('id')->on('jenis_pembayarans');
            $table->foreign('id_diagnosis')->references('id')->on('diagnoses');
            $table->foreign('pindah_dari')->references('id')->on('kamars');
            $table->foreign('pindah_ke')->references('id')->on('kamars');
            $table->foreign('id_rumah_sakit_rujuks')->references('id')->on('rumah_sakit_rujuks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayats');
    }
}
