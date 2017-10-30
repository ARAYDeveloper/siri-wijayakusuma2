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
        $data = pasien::where('status_rawat', 'tidak')->get();
        $kamar = kamar::all();
        $bayar = jenisPembayaran::all();
        $diagnosis = diagnosis::all();
        $datars = RumahSakitRujuk::all();
        $riwayat = riwayat::whereDate('created_at', date('Y-m-d'))->orderBy('created_at', 'DESC')->get();
        return view('admin.pasien', compact('data', 'kamar', 'bayar', 'diagnosis', 'datars', 'riwayat'));
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
        $lamaJam = 0;
        if ($request->tgl_keluar != '') {
            $convert_keluar = new \DateTime($request->tgl_keluar);
            $convert_masuk = new \DateTime($request->tgl_masuk);
            $cekmasuk = Carbon::parse($request->tgl_masuk);
            $cekkeluar = Carbon::parse($request->tgl_keluar);
            $diffhours = $cekkeluar->diffInHours($cekmasuk);
            $lamaJam = $diffhours;
            $difftanggal = $convert_masuk->diff($convert_keluar);
            $hariRawat = $difftanggal->days + 1;
            $lamaRawat = $difftanggal->days;
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

        $datanya = [
            "id_pasien" => $request->id_pasien,
            "id_kamar" => $request->id_kamar,
            "id_pembayaran" => $request->id_pembayaran,
            "id_diagnosis" => $request->id_diagnosis,
            "tgl_masuk" => $request->tgl_masuk,
            "pindah" => $request->pindah,
            "pulang_paksa" => $request->pulang_paksa,
            "status_keluar" => $request->status_keluar,
            "jumlah_hari_perawatan" => $hariRawat,
            "jumlah_lama_perawatan" => $lamaRawat,

        ];
        if ($request->tgl_keluar != '') {
            $datanya["tgl_keluar"] = $request->tgl_keluar;
        }
        if ($request->status_keluar == "Dirujuk") {
            $datanya["id_rumah_sakit_rujuks"] = $request->id_rumah_sakit_rujuks;
        }
        if ($request->status_keluar == "Meninggal") {
            if ($lamaJam <= 48) {
                $datanya["kurang_48"] = '1';
            } elseif ($lamaJam > 48) {
                $datanya["lebih_48"] = '1';
            }
        }

        $riwayats = riwayat::create($datanya);

        $dataRiwayats = riwayat::with(['pasien', 'diagnosis'])->where('created_at', '=', $date)->get();

        if ($riwayats) {
            if ($request->tgl_keluar == '') {
                pasien::find($request->id_pasien)->update(
                    ['status_rawat' => 'dirawat']
                );
            }
            $response["message"] = "Data Berhasil Di Simpan";
            $response["data"] = compact('dataRiwayats');
            return response()->json($response, 201);
        } else {
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
        $riwayat = riwayat::where('id', $id)->first();
        $hariRawat = 0;
        $lamaRawat = 0;
        $lebih_dari = 0;
        $kurang_dari = 0;
        if ($request->tgl_keluar != '') {
            $convert_keluar = new \DateTime($request->tgl_keluar);
            $convert_masuk = new \DateTime($riwayat->tgl_masuk);
            $cekmasuk = Carbon::parse($riwayat->tgl_masuk);
            $cekkeluar = Carbon::parse($request->tgl_keluar);
            $diffhours = $cekkeluar->diffInHours($cekmasuk);
            if ($request->status_keluar == "Meninggal") {
                if ($diffhours <= 48) {
                    $kurang_dari = '1';
                    $lebih_dari = '0';
                } elseif ($diffhours > 48) {
                    $kurang_dari = '0';
                    $lebih_dari = '1';
                }
            }
            $difftanggal = $convert_masuk->diff($convert_keluar);
            $hariRawat = $difftanggal->days + 1;
            $lamaRawat = $difftanggal->days;
            if ($request->status_keluar == "Dirujuk") {
                $rujuk = $request->id_rumah_sakit_rujuks;
            } else {
                $rujuk = null;
            }
        }

        $updates = riwayat::where('id', $id)->update([
            'pulang_paksa' => $request->pulang_paksa,
            'status_keluar' => $request->status_keluar,
            'jumlah_hari_perawatan' => $hariRawat,
            'jumlah_lama_perawatan' => $lamaRawat,
            'tgl_keluar' => $request->tgl_keluar,
            'kurang_48' => $kurang_dari,
            'lebih_48' => $lebih_dari,
            'id_rumah_sakit_rujuks' => $rujuk
        ]);


        $dataRiwayats = riwayat::with(['pasien', 'diagnosis', 'kamar'])->where('tgl_keluar', null)->get();
        $dataRiwayatKeluar = riwayat::with(['pasien', 'diagnosis', 'kamar'])->where('tgl_keluar', '<>', null)->get();
        if ($updates) {
            pasien::where('id', $riwayat->id_pasien)->update(
                ['status_rawat' => 'tidak']
            );
            $response["message"] = "Data Berhasil Di Simpan";
            $response["data"] = compact('dataRiwayats', 'dataRiwayatKeluar');
            return response()->json($response, 201);
        } else {
            $response["message"] = "Data Gagal Di Simpan";
            $response["data"] = compact('dataRiwayats', 'dataRiwayatKeluar');
            return response()->json($response, 501);
        }
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
