<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class c_admin extends Controller

{

	// Dashboard
    public function index(){
        return view('admin.dashboard');
    }

    public function changeSlider(Request $request, $id){
        $ext = $request->file('file_'.$id)->getClientOriginalExtension();
        $name = $id.'.'.$ext;
        $request->file('file_'.$id)->move('slider/',$name);
        return redirect('/adm_dash');
    }

    public function login(){
        return view('admin.login');
    }

    // Pasien
    public function pasien(){
    	return view('admin.pasien');
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

    // Master
    public function m_jenis_pelayanan(){
        return view('admin.m_jenis_pelayanan');
    }
    public function m_jenis_pembayaran(){
        return view('admin.m_jenis_pembayaran');
    }
    public function m_data_kamar(){
        return view('admin.m_data_kamar');
    }
    public function m_data_pasien(){
        return view('admin.m_data_pasien');
    }

    // Transaksi
    public function t_pasien_masuk(){
        return view('admin.t_pasien_masuk');
    }
    public function t_pasien_keluar(){
        return view('admin.t_pasien_keluar');
    }

    // Profil
    public function profil(){
        return view('admin.profil');
    }

     // Print
    public function print(){
    	return view('admin.print');
    }


     // Laporan
    public function laporan_harian(){
    	return view('admin.laporan_harian');
    }
    public function laporan_bulanan(){
    	return view('admin.laporan_bulanan');
    }

      // Kurir
    public function kurir(){
    	return view('admin.kurir');
    }

    // Testimoni
    public function testimoni(){
    	return view('admin.testimoni');
    }
    public function d_testimoni(){
    	return view('admin.d_testimoni');
    }
    public function master(){
        return view('admin.kaka');
    }
    public function coba(){
        return view('admin.coba');
    }
}

