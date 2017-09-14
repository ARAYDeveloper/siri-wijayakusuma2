<?php

namespace App\Http\Controllers;

use App\diagnosis;
use App\jenisPembayaran;
use App\kamar;
use App\pasien;
use App\riwayat;
use App\RumahSakitRujuk;
use Illuminate\Http\Request;
use Carbon\Carbon;

class riwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = pasien::all();
        $kamar = kamar::all();
        $bayar = jenisPembayaran::all();
        $diagnosis = diagnosis::all();
        $datars = RumahSakitRujuk::all();
        return view('admin.pasien', compact('data', 'kamar', 'bayar', 'diagnosis', 'datars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hariRawat = 0;
        $lamaRawat = 0;
        if ($request['tgl_keluar'] != '') {
            $hariRawat = (date_diff($request['tgl_keluar'], $request['tgl_masuk']) + 1);
            $lamaRawat = date_diff($request['tgl_keluar'], $request['tgl_masuk']);
        }

        $date = Carbon::now('Asia/Jakarta')->toDateTimeString();

//        $riw = new riwayat();
//        $riw->id_pasien = $request['id_pasien'];
//        $riw->id_kamar = $request['id_kamar'];
//        $riw->id_pembayaran = $request['id_pembayaran'];
//        $riw->no_asuransi = $request['no_asuransi'];
//        $riw->id_diagnosis = $request['id_diagnosis'];
//        $riw->tgl_masuk = $request['tgl_masuk'];
//        $riw->tgl_lapor = $request['tgl_lapor'];
//        $riw->tgl_keluar = $request['tgl_keluar'];
//        $riw->pindah_dari = $request['pindah_dari'];
//        $riw->pindah_ke = $request['pindah_ke'];
//        $riw->pulang_paksa = $request['pulang_paksa'];
//        $riw->status_keluar = $request['status_keluar'];
//        $riw->jumlah_hari_perawatan = $hariRawat;
//        $riw->jumlah_lama_perawatan = $lamaRawat;
//        $riw->created_at = $date;
//        $riw->updated_at = $date;
//        $riw->id_rumah_sakit_rujuks = $request['id_rumah_sakit_rujuks'];
//        $riw->save();
//
//        $response["message"] = "Data Berhasil Di Simpan";
////        $response["data"] = compact('dataRiwayats');
//        return response()->json($response, 201);

        $riwayats = riwayat::create([
            "id_pasien" => $request['id_pasien'],
            "id_kamar" => $request['id_kamar'],
            "id_pembayaran" => $request['id_pembayaran'],
            "no_asuransi" => $request['no_asuransi'],
            "id_diagnosis" => $request['id_diagnosis'],
            "tgl_masuk" => $request['tgl_masuk'],
            "tgl_lapor" => $request['tgl_lapor'],
            "tgl_keluar" => $request['tgl_keluar'],
            "pindah_dari" => $request['pindah_dari'],
            "pindah_ke" => $request['pindah_ke'],
            "pulang_paksa" => $request['pulang_paksa'],
            "status_keluar" => $request['status_keluar'],
            "jumlah_hari_perawatan" => $hariRawat,
            "jumlah_lama_perawatan" => $lamaRawat,
            "id_rumah_sakit_rujuks" => $request['id_rumah_sakit_rujuks']
        ]);

        $dataRiwayats = riwayat::with(['pasien', 'diagnosis'])->where('created_at','=', $date)->get();

        if ($riwayats){
            $response["message"] = "Data Berhasil Di Simpan";
            $response["data"] = compact('dataRiwayats');
            return response()->json($response, 201);
        }else{
            $response["message"] = "Data Gagal Di Simpan";
            $response["data"] = compact('dataRiwayats');
            return response()->json($response, 501);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
