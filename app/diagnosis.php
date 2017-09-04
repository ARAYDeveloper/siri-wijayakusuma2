<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class diagnosis extends Model
{
    protected $table = "diagnoses";
    protected $primaryKey = "id";
    protected $fillable = ['id','kode_dtd', 'kode_icd', 'nama_penyakit', 'deskripsi'];

    public $timestamps = true;

    public function riwayat()
    {
        return $this->hasMany(riwayat::class, 'id_diagnosis','id');
    }
}
