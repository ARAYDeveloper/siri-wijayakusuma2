<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->increments('id');
            $table->char('nik',16)->unique()->nullable();
            $table->string('nama');
            $table->date('tgl_lahir', 30);
            $table->text('alamat');
            $table->enum('jenis_kelamin',['Laki-Laki','Perempuan']);
            $table->enum('agama',['Islam', 'Hindu', 'Budha', 'Katolik', 'Protestan', 'Konghucu']);
            $table->enum('kewarganegaraan',['WNI', 'WNA']);
            $table->enum('status', ['Kawin', 'Belum Kawin']);
            $table->string('no_rm')->unique();
            $table->enum('status_rawat',['tidak','dirawat']);
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
        Schema::dropIfExists('pasiens');
    }
}
