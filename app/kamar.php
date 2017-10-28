<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kamar extends Model
{
    protected $table = "kamars";
    protected $primaryKey = "id";
    protected $fillable = ['id','nama_kamar', 'sisa_pakai', 'jumlah', 'id_pelayanan'];

    public $timestamps = true;

    public function jenisLayanan()
    {
        return $this->belongsTo('App\jenisPelayanan','id_pelayanan','id');
    }

    public function riwayat()
    {
        return $this->hasMany(riwayat::class, 'id_kamar','id');
    }
}
