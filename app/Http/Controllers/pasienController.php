<?php

namespace App\Http\Controllers;

use App\pasien;
use Illuminate\Http\Request;

class pasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pasien = pasien::all();
        return view('admin.m_data_pasien', compact('pasien'));
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
        $cekNoRm = pasien::where('no_rm', $request->no_rm)->first();
        if ($cekNoRm == null) {
            $pasien = pasien::create($request->all());
            $dataPasien = pasien::all();
            if ($pasien) {
                $response["message"] = "Data Berhasil Di Simpan";
                $response["data"] = compact('dataPasien');
                return response()->json($response, 201);
            } else {
                $response["message"] = "Data Gagal Di Simpan";
                $response["data"] = compact('dataPasien');
                return response()->json($response, 501);
            }
        } else {
            $response["message"] = "No RM sudah terdaftar !";
            return response()->json($response, 201);
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
        $dataPasien = pasien::find($id);
        $response["data"] = compact('dataPasien');

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
        $cekNoRm = pasien::where('id', '<>', $id)->where('no_rm', $request->no_rm)->first();
        if ($cekNoRm == null) {
            $updates = pasien::find($id)->update($request->all());

            $dataPasien = pasien::all();

            if ($updates) {
                $response ["error"] = false;
                $response ["message"] = "Data Berhasil Di Ubah !";
                $response ["data"] = compact('dataPasien');
                return response()->json($response, 200);
            } else {
                $response ["error"] = false;
                $response ["message"] = "Data Gagal Di Ubah !";
                $response ["data"] = compact('dataPasien');
                return response()->json($response, 501);
            }
        } else {
            $response ["message"] = "No RM Sudah Terdaftar Atas Nama Pasien Lain";
            return response()->json($response, 200);
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
        $pasien = pasien::find($id);
        $pasien->delete();

        $dataPasien = pasien::all();

        $response["message"] = "Data Berhasil Di Hapus";
        $response["data"] = compact('dataPasien');
        return response()->json($response, 200);
    }

//    private function newID()
//    {
//        $pasien = pasien::all();
//        $id = array();
//        if (count($pasien) != 0) {
//            foreach ($pasien as $bayar) {
//                $id [] = $bayar->id_pasien;
//            }
//            array_multisort(array_map('strlen', $id), $id);
//            $newID = 'PAS' . (substr($id [count($id) - 1], 3, strlen($id [count($id) - 1])) + 1);
//            return $newID;
//        }else{
//            $newID = 'PAS1' ;
//            return $newID;
//        }
//    }
}
