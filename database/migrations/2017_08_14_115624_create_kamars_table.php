<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kamars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kamar');
            $table->integer('jumlah');
            $table->integer('sisa_pakai');
            $table->integer('id_pelayanan')->unsigned();
            $table->timestamps();

            $table->foreign('id_pelayanan')->references('id')->on('jenis_pelayanans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kamars');
    }
}
