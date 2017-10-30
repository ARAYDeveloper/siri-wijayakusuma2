<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    protected $table = "pasiens";
    protected $primaryKey = "id";
    protected $fillable = ['id','nama', 'tgl_lahir', 'alamat', 'jenis_kelamin', 'agama', 'kewarganegaraan', 'status', 'no_rm','status_rawat'];

    public $timestamps = true;

    public function riwayat()
    {
        return $this->hasMany(riwayat::class, 'id_pasien','id');
    }
}
