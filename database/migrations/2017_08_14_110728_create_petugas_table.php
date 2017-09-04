<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePetugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petugas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nip')->unique();
            $table->string('nik' )->unique();
            $table->string('nama');
            $table->date('tgl_lahir', 30);
            $table->text('alamat');
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->enum('agama', ['Islam', 'Hindu', 'Budha', 'Katolik', 'Protestan', 'Konghucu']);
            $table->enum('kewarganegaraan', ['WNI', 'WNA']);
            $table->enum('status', ['Kawin', 'Belum Kawin']);
            $table->integer('id_spesialis')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('id_spesialis')->references('id')->on('spesialis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('petugas');
    }
}
