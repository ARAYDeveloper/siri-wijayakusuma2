<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaporanInternal extends Model
{
    protected $table = 'laporan_internals';
    protected $primaryKey = 'id';
    protected $fillable = ['tahun', 'bulan', 'nama_kamar', 'pasien_masuk', 'pasien_keluar', 'hr_perawatan', 'lm_perawatan', 'jml_tt', 'periode', 'mati_lebih_48', 'mati_kurang_48', 'id_riwayats'];
    public $timestamps = true;
}
