<?php

namespace App\Http\Controllers;

use App\petugas;
use App\Spesialis;
use Illuminate\Http\Request;

class petugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugas = petugas::all();
        $spesialis = Spesialis::all();
        return view('admin.m_data_petugas', compact('petugas','spesialis'));
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
        $petugas = petugas::create($request->all());

        $dataPetugas = petugas::with('spesialis')->get();

        if ($petugas){
            $response["message"] = "Data Berhasil Di Simpan";
            $response["data"] = compact('dataPetugas');
            return response()->json($response, 201);
        }else{
            $response["message"] = "Data Gagal Di Simpan";
            $response["data"] = compact('dataPetugas');
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
        $dataPetugas = petugas::with('spesialis')->find($id);
        $response["data"] = compact('dataPetugas');

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
        $updates = petugas::find($id)->update($request->all());

        $dataPetugas = petugas::with('spesialis')->get();

        if ($updates){
            $response ["error"] = false;
            $response ["message"] = "Data Berhasil Di Ubah !";
            $response ["data"] = compact('dataPetugas');

            return response()->json($response, 200);
        }else{
            $response ["error"] = true;
            $response ["message"] = "Data Gagal Di Ubah !";
            $response ["data"] = compact('dataPetugas');

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
        $petugas = petugas::find($id);
        $petugas->delete();

        $dataPetugas = petugas::all();

        $response["message"] = "Data Berhasil Di Hapus";
        $response["data"] = compact('dataPetugas');
        return response()->json($response, 200);
    }

//    private function newID()
//    {
//        $petugas = petugas::all();
//        $id = array();
//        if (count($petugas) != 0) {
//            foreach ($petugas as $bayar) {
//                $id [] = $bayar->id_pegawai;
//            }
//            array_multisort(array_map('strlen', $id), $id);
//            $newID = 'PEG' . (substr($id [count($id) - 1], 3, strlen($id [count($id) - 1])) + 1);
//            return $newID;
//        }else{
//            $newID = 'PEG1' ;
//            return $newID;
//        }
//    }
}
