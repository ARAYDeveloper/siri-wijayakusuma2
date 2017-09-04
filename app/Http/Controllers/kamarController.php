<?php

namespace App\Http\Controllers;

use App\jenisPelayanan;
use App\kamar;
use Illuminate\Http\Request;

class kamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kamar = kamar::all();
        $layanan = jenisPelayanan::all();
        return view('admin.m_data_kamar', compact('kamar', 'layanan'));
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
        $kamar = kamar::create([
            'nama_kamar' => $request->nama_kamar,
            'jumlah' => $request->jumlah,
            'sisa_pakai' => $request->jumlah,
            'id_pelayanan' => $request->layanan
        ]);

        $dataKamar = kamar::with('jenisLayanan')->get();

        if ($kamar){
            $response["message"] = "Data Berhasil Di Simpan !";
            $response["data"] = compact('dataKamar');
            return response()->json($response, 201);
        }else{
            $response["message"] = "Data Gagal Di Simpan !";
            $response["data"] = compact('dataKamar');
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
        $dataKamar = kamar::find($id);
        $response["data"] = compact('dataKamar');

        return response()->json($response, 200);
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
        $kamar = kamar::find($id)->update([
            'nama_kamar' => $request->nama_kamar,
            'jumlah' => $request->jumlah,
            'id_pelayanan' => $request->layanan
        ]);

        $dataKamar = kamar::with('jenisLayanan')->get();

        if ($kamar){
            $response["message"] = "Data Berhasil Di Ubah !";
            $response["data"] = compact('dataKamar');
            return response()->json($response, 200);
        }else{
            $response["message"] = "Data Gagal Di Ubah !";
            $response["data"] = compact('dataKamar');
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
        $kamar = kamar::find($id);
        $kamar->delete();

        $dataKamar = kamar::with('jenisLayanan')->get();
        $response["message"] = "Data Berhasil Di hapus !";
        $response["data"] = compact('dataKamar');
        return response()->json($response, 200);
    }

//    private function newID()
//    {
//        $kamar = kamar::all();
//        $id = array();
//        if (count($kamar) != 0) {
//            foreach ($kamar as $bayar) {
//                $id [] = $bayar->id_kamar;
//            }
//            array_multisort(array_map('strlen', $id), $id);
//            $newID = 'KMR' . (substr($id [count($id) - 1], 3, strlen($id [count($id) - 1])) + 1);
//            return $newID;
//        }else{
//            $newID = 'KMR1' ;
//            return $newID;
//        }
//    }

    public function getLayanan()
    {
        $dataLayanan = jenisPelayanan::all();
        $response["data"] = compact('dataLayanan');
        return response()->json($response, 200);
    }

}
