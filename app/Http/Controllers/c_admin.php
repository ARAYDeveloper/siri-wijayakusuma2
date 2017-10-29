<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\kamar;
use App\jenisPelayanan;
use App\riwayat;
use App\RumahSakitRujuk;

class c_admin extends Controller
{

    // Dashboard
    public function index()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login.index'));
    }


    // Laporan
    public function laporan_internal($tahunnya = null)
    {
        $datatahun = riwayat::select(DB::raw('YEAR(created_at) as tahun'))->distinct('tahun')->get();
        $datanya[] ='';
        if ($tahunnya != null) {
            for ($i = 0; $i < 12; $i++) {
                $pasienawal = '';
                $pasienmasuk = '';
                $pasienkeluar = '';
                $sisapasien = '';
                $jml_hari_perawatan = '';
                $jml_lama_dirawat = '';
                $tt = '';
                $periode = 1;
                $mati_kurang_48 = '';
                $mati_lebih_48 = '';

                //hitung pasien awal
                if ($i == 0) {
                    $cekpasienawal = riwayat::whereYear('tgl_masuk', $tahunnya - 1)->whereMonth('tgl_masuk', '12')->whereNull('tgl_keluar')->get();
                    if ($cekpasienawal != null) {
                        $pasienawal = riwayat::whereYear('tgl_masuk', $tahunnya - 1)->whereMonth('tgl_masuk', '12')->whereNull('tgl_keluar')->count('tgl_masuk');
                    } else {
                        $pasienawal = 0;
                    }
                } else {
                    $cekpasienawal = riwayat::whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i)->whereNull('tgl_keluar')->get();
                    if ($cekpasienawal != null) {
                        $pasienawal = riwayat::whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i)->whereNull('tgl_keluar')->count('tgl_masuk');
                    } else {
                        $pasienawal = 0;
                    }
                }

                //hitung pasien masuk
                $cekpasienmasuk = riwayat::whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i + 1)->get();
                if ($cekpasienmasuk != null) {
                    $pasienmasuk = riwayat::whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i + 1)->count('tgl_masuk');
                } else {
                    $pasienmasuk = 0;
                }

                //hitung pasien keluar
                $cekpasienkeluar = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->get();
                if ($cekpasienkeluar != null) {
                    $pasienkeluar = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->count('tgl_keluar');
                } else {
                    $pasienkeluar = 0;
                }

                //hitung sisa pasien
                $ceksisapasien = riwayat::whereNull('tgl_keluar')->whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i + 1)->get();
                if ($ceksisapasien != null) {
                    $sisapasien = riwayat::whereNull('tgl_keluar')->whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i + 1)->count('tgl_masuk');
                } else {
                    $sisapasien = 0;
                }

                //hitung jumlah hari perawatan
                $cekjml_hari_perawatan = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->get();
                if ($cekjml_hari_perawatan != null) {
                    $jml_hari_perawatan = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->sum('jumlah_hari_perawatan');
                } else {
                    $jml_hari_perawatan = 0;
                }

                //jumlah lama dirawat
                $cekjml_lama_dirawat = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->get();
                if ($cekjml_lama_dirawat != null) {
                    $jml_lama_dirawat = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->sum('jumlah_lama_perawatan');
                } else {
                    $jml_lama_dirawat = 0;
                }

                //jumlah tt
                $tt = kamar::count();

                //hitung periode
                $periode = cal_days_in_month(CAL_GREGORIAN, $i + 1, $tahunnya);

                //hitung mati <= 48 jam
                $cekmati_kurang_48 = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('status_keluar', 'Meninggal')->where('kurang_48', '=', '1')->get();
                if ($cekmati_kurang_48 != null) {
                    $mati_kurang_48 = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('status_keluar', 'Meninggal')->where('kurang_48', '=', '1')->count('kurang_48');
                } else {
                    $mati_kurang_48 = 0;
                }

                //hitung mati > 48 jam
                $cekmati_lebih_48 = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('status_keluar', 'Meninggal')->where('lebih_48', '=', '1')->get();
                if ($cekmati_lebih_48 != null) {
                    $mati_lebih_48 = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('status_keluar', 'Meninggal')->where('lebih_48', '=', '1')->sum('lebih_48');
                } else {
                    $mati_lebih_48 = 0;
                }

                $datanya[$i]['bulan'] = date("F", mktime(0, 0, 0, $i + 1, 1));
                $datanya[$i]['pasienawal'] = $pasienawal;
                $datanya[$i]['pasienmasuk'] = $pasienmasuk;
                $datanya[$i]['pasienkeluar'] = $pasienkeluar;
                $datanya[$i]['sisapasien'] = $sisapasien;
                $datanya[$i]['jml_hari_perawatan'] = $jml_hari_perawatan;
                $datanya[$i]['jml_lama_dirawat'] = $jml_lama_dirawat;
                $datanya[$i]['tt'] = $tt;
                $datanya[$i]['periode'] = $periode;
                $datanya[$i]['mati_kurang_48'] = $mati_kurang_48;
                $datanya[$i]['mati_lebih_48'] = $mati_lebih_48;
            }
        }
        return view('admin.laporan_internal', compact('datatahun','tahunnya','datanya'));
    }

    public function laporan_external_rl12($tahunnya = null, $kamarid = null)
    {
        $datatahun = riwayat::select(DB::raw('YEAR(created_at) as tahun'))->distinct('tahun')->get();
        $datakamar = kamar::all();
        $datanya[] ='';
        if ($tahunnya != null && $kamarid != null) {
            for ($i = 0; $i < 12; $i++) {
                $pasienawal = 0;
                $pasienmasuk = 0;
                $pasienkeluar = 0;
                $sisapasien = '';
                $jml_hari_perawatan = 0;
                $jml_lama_dirawat = 0;
                $tt = 0;
                $periode =0;
                $mati_kurang_48 = 0;
                $mati_lebih_48 = 0;

                //hitung pasien awal
                if ($i == 0) {
                    $cekpasienawal = riwayat::whereYear('tgl_masuk', $tahunnya - 1)->whereMonth('tgl_masuk', '12')->whereNull('tgl_keluar')->get();
                    if ($cekpasienawal != null) {
                        $pasienawal = riwayat::whereYear('tgl_masuk', $tahunnya - 1)->whereMonth('tgl_masuk', '12')->whereNull('tgl_keluar')->count('tgl_masuk');
                    } else {
                        $pasienawal = 0;
                    }
                } else {
                    $cekpasienawal = riwayat::whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i)->whereNull('tgl_keluar')->get();
                    if ($cekpasienawal != null) {
                        $pasienawal = riwayat::whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i)->whereNull('tgl_keluar')->count('tgl_masuk');
                    } else {
                        $pasienawal = 0;
                    }
                }

                //hitung pasien masuk
                $cekpasienmasuk = riwayat::whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i + 1)->get();
                if ($cekpasienmasuk != null) {
                    $pasienmasuk = riwayat::whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i + 1)->count('tgl_masuk');
                } else {
                    $pasienmasuk = 0;
                }

                //hitung pasien keluar
                $cekpasienkeluar = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->get();
                if ($cekpasienkeluar != null) {
                    $pasienkeluar = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->count('tgl_keluar');
                } else {
                    $pasienkeluar = 0;
                }

                //hitung sisa pasien
                $ceksisapasien = riwayat::whereNull('tgl_keluar')->whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i + 1)->get();
                if ($ceksisapasien != null) {
                    $sisapasien = riwayat::whereNull('tgl_keluar')->whereYear('tgl_masuk', $tahunnya)->whereMonth('tgl_masuk', $i + 1)->count('tgl_masuk');
                } else {
                    $sisapasien = 0;
                }

                //hitung jumlah hari perawatan
                $cekjml_hari_perawatan = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->get();
                if ($cekjml_hari_perawatan != null) {
                    $jml_hari_perawatan = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->sum('jumlah_hari_perawatan');
                } else {
                    $jml_hari_perawatan = 0;
                }

                //jumlah lama dirawat
                $cekjml_lama_dirawat = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->get();
                if ($cekjml_lama_dirawat != null) {
                    $jml_lama_dirawat = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->sum('jumlah_lama_perawatan');
                } else {
                    $jml_lama_dirawat = 0;
                }

                //jumlah tt
                $tt = kamar::count();

                //hitung periode
                $periode = cal_days_in_month(CAL_GREGORIAN, $i + 1, $tahunnya);

                //hitung mati <= 48 jam
                $cekmati_kurang_48 = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('status_keluar', 'Meninggal')->where('kurang_48', '=', '1')->get();
                if ($cekmati_kurang_48 != null) {
                    $mati_kurang_48 = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('status_keluar', 'Meninggal')->where('kurang_48', '=', '1')->count('kurang_48');
                } else {
                    $mati_kurang_48 = 0;
                }

                //hitung mati > 48 jam
                $cekmati_lebih_48 = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('status_keluar', 'Meninggal')->where('lebih_48', '=', '1')->get();
                if ($cekmati_lebih_48 != null) {
                    $mati_lebih_48 = riwayat::whereNotNull('tgl_keluar')->whereYear('tgl_keluar', $tahunnya)->whereMonth('tgl_keluar', $i + 1)->where('status_keluar', 'Meninggal')->where('lebih_48', '=', '1')->sum('lebih_48');
                } else {
                    $mati_lebih_48 = 0;
                }

                $datanya[$i]['bulan'] = date("F", mktime(0, 0, 0, $i + 1, 1));
                $datanya[$i]['pasienawal'] = $pasienawal;
                $datanya[$i]['pasienmasuk'] = $pasienmasuk;
                $datanya[$i]['pasienkeluar'] = $pasienkeluar;
                $datanya[$i]['sisapasien'] = $sisapasien;
                $datanya[$i]['jml_hari_perawatan'] = $jml_hari_perawatan;
                $datanya[$i]['jml_lama_dirawat'] = $jml_lama_dirawat;
                $datanya[$i]['tt'] = $tt;
                $datanya[$i]['periode'] = $periode;
                $datanya[$i]['mati_kurang_48'] = $mati_kurang_48;
                $datanya[$i]['mati_lebih_48'] = $mati_lebih_48;
            }
        }

        return view('admin.laporan_external_rl12', compact('datatahun','datakamar','tahunnya'));
    }

    public function laporan_external_rl13($tahunnya = null)
    {
        $datatahun = kamar::select(DB::raw('YEAR(created_at) as tahun'))->distinct('tahun')->get();
        if ($tahunnya != null) {
            $kamarnya = kamar::whereYear('created_at', $tahunnya)->get();
            $datapelayanan = jenisPelayanan::all();
//            $datanya[] = '';
//            for ($i = 0; $i < count($datapelayanan); $i++) {
//                $datakamar = kamar::where('id_pelayanan', $datapelayanan[$i]->id)->whereYear('created_at',$tahunnya)->get();
//                for ($j = 0; $j < count($datakamar); $j++) {
//                    $datanya[$i][$j] = $datakamar;
//                }
//            }
            return view('admin.laporan_external_rl13', compact('datatahun', 'tahunnya', 'kamarnya', 'datapelayanan'));
        }

        return view('admin.laporan_external_rl13', compact('datatahun', 'tahunnya'));
    }

    public function laporan_external_rl31($tahunnya = 2016)
    {
        $ceker = riwayat::join('kamars as k', 'riwayats.id_kamar', '=', 'k.id')->whereYear('riwayats.created_at', 2016)->where('id_pelayanan',2)->get();

        $datatahun = riwayat::select(DB::raw('YEAR(created_at) as tahun'))->distinct('tahun')->get();
        if ($tahunnya != null) {
            $pelayanan = jenisPelayanan::all();
            $riwayats = riwayat::all();
            $pasien = App\pasien::all();
            $kamar = kamar::all();
            return view('admin.laporan_external_rl31', compact('datatahun', 'pelayanan', 'tahunnya', 'pasien', 'riwayats', 'kamar'));
        }
        return view('admin.laporan_external_rl31', compact('datatahun'));
    }

    public function laporan_external_rl4a()
    {
        return view('admin.laporan_external_rl4a');
    }

    public function laporan_external_rl53()
    {
        return view('admin.laporan_external_rl53');
    }

    // Cetak
    public function cetak_internal()
    {
        return view('admin.laporan_internal_print');
    }

    public function cetak_laporan_external_rl12()
    {
        return view('admin.cetak_laporan_external_rl12');
    }

    public function cetak_laporan_external_rl13()
    {
        return view('admin.cetak_laporan_external_rl13');
    }

    public function cetak_laporan_external_rl31()
    {
        return view('admin.cetak_laporan_external_rl31');
    }

    public function cetak_laporan_external_rl4a()
    {
        return view('admin.cetak_laporan_external_rl4a');
    }

    public function cetak_laporan_external_rl53()
    {
        return view('admin.cetak_laporan_external_rl53');
    }

    // Transaksi
    public function t_pasien_masuk()
    {
        $data = riwayat::all();
        return view('admin.t_pasien_masuk', compact('data'));
    }

    public function t_pasien_keluar()
    {
        $data = riwayat::where('tgl_keluar', '<>', null)->get();
        $rawat = riwayat::where('tgl_keluar', null)->get();
        $datars = RumahSakitRujuk::all();
        return view('admin.t_pasien_keluar', compact('data', 'rawat', 'datars'));
    }

}

