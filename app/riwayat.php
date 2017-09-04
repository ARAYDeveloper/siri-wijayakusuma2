<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class riwayat extends Model
{
    protected $table = "riwayats";
    protected $primaryKey = "id";
    protected $fillable = ['id','id_pasien', 'id_kamar', 'id_pembayaran', 'id_diagnosis', 'tgl_masuk', 'tgl_lapor', 'tgl_keluar', 'pindah_dari', 'pindah_ke',
        'pulang_paksa', 'jumlah_hari_perawatan', 'jumlah_lama_perawatan', 'status_keluar'];
    public $timestamps = false;

    public function pasien()
    {
        return $this->belongsTo(pasien::class, 'id_pasien');
    }

    public function kamar()
    {
        return $this->belongsTo(kamar::class, ['id_kamar', 'pindah_dari', 'pindah_ke']);
    }

    public function jenisPembayaran()
    {
        return $this->belongsTo(jenisPembayaran::class, 'id_pembayaran');
    }

    public function diagnosis()
    {
        return $this->belongsTo(diagnosis::class, 'id_diagnosis');
    }
}
