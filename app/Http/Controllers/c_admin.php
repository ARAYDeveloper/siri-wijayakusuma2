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
    public function laporan_internal()
    {
        return view('admin.laporan_internal');
    }

    public function laporan_external_rl12()
    {
        return view('admin.laporan_external_rl12');
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

    public function laporan_external_rl31($tahun = 2016)
    {
        $datatahun = riwayat::select(DB::raw('YEAR(created_at) as tahun'))->distinct('tahun')->get();
        if ($tahun != null) {
            $pelayanan = jenisPelayanan::all();
            $riwayats = riwayat::all();
            $pasien = App\pasien::all();
            $kamar = kamar::all();
            return view('admin.laporan_external_rl31', compact('datatahun', 'pelayanan', 'tahun', 'pasien', 'riwayats', 'kamar'));
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

