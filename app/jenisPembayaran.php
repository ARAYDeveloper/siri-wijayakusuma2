<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenisPembayaran extends Model
{
    protected $table = "jenis_pembayarans";
    protected $primaryKey = "id";
    protected $fillable = ['id', 'jenis_pembayaran'];

    public $timestamps = true;

    public function riwayat()
    {
        return $this->hasMany(riwayat::class, 'id_pembayaran','id');
    }
}
