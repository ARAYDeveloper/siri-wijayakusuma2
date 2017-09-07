<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class c_admin extends Controller
{

	// Dashboard
    public function index(){
        return view('admin.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login.index'));
    }


    // Laporan
    public function laporan_internal(){
    	return view('admin.laporan_internal');
    }
    public function laporan_external_rl12(){
    	return view('admin.laporan_external_rl12');
    }
    public function laporan_external_rl13(){
        return view('admin.laporan_external_rl13');
    }
    public function laporan_external_rl31(){
        return view('admin.laporan_external_rl31');
    }
    public function laporan_external_rl4a(){
        return view('admin.laporan_external_rl4a');
    }
    public function laporan_external_rl53(){
        return view('admin.laporan_external_rl53');
    }

    // Cetak
    public function cetak_internal(){
        return view('admin.laporan_internal_print');
    }
    public function cetak_laporan_external_rl12(){
        return view('admin.cetak_laporan_external_rl12');
    }
    public function cetak_laporan_external_rl13(){
        return view('admin.cetak_laporan_external_rl13');
    }
    public function cetak_laporan_external_rl31(){
        return view('admin.cetak_laporan_external_rl31');
    }
    public function cetak_laporan_external_rl4a(){
        return view('admin.cetak_laporan_external_rl4a');
    }
    public function cetak_laporan_external_rl53(){
        return view('admin.cetak_laporan_external_rl53');
    }

    // Transaksi
    public function t_pasien_masuk(){
        return view('admin.t_pasien_masuk');
    }
    public function t_pasien_keluar(){
        return view('admin.t_pasien_keluar');
    }

}

