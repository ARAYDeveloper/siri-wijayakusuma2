<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class petugas extends Model
{
    protected $table = "petugas";
    protected $primaryKey = "id";
    protected $fillable = ['id','nip','nik', 'nama', 'tgl_lahir', 'alamat', 'jenis_kelamin', 'agama', 'kewarganegaraan', 'status', 'id_spesialis'];

    public $timestamps = true;

    public function spesialis()
    {
        return $this->belongsTo(Spesialis::class, 'id_spesialis','id');
    }
}
