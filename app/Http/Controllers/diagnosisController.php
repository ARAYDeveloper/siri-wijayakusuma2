<?php

namespace App\Http\Controllers;

use App\diagnosis;
use Illuminate\Http\Request;

class diagnosisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diagnosis = diagnosis::all();
        return view('admin.m_data_diagnosis', compact('diagnosis'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $diagnosis = diagnosis::create([
            'kode_dtd' => $request->kode_dtd,
            'kode_icd' => $request->kode_icd,
            'nama_penyakit' => $request->nama,
            'deskripsi' => $request->deskripsi
        ]);


        $dataDiagnosis = diagnosis::all();

        $response["message"] = "Data Berhasil Di Simpan";
        $response["data"] = compact('dataDiagnosis');
        return response()->json($response, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataDiagnosis = diagnosis::find($id);
        $response["data"] = compact('dataDiagnosis');
        return response()->json($response, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $diagnosis = diagnosis::find($id)->update([
            'kode_dtd' => $request->kode_dtd,
            'kode_icd' => $request->kode_icd,
            'nama_penyakit' => $request->nama,
            'deskripsi' => $request->deskripsi
        ]);

        $dataDiagnosis = diagnosis::all();

        $response["message"] = "Data Berhasil Di Ubah !";
        $response["data"] = compact('dataDiagnosis');
        return response()->json($response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $diagnosis = diagnosis::find($id);
        $diagnosis->delete();

        $dataDiagnosis = diagnosis::all();
        $response["message"] = "Data Berhasil Di Hapus !";
        $response["data"] = compact('dataDiagnosis');
        return response()->json($response, 200);
    }

//    private function newID()
//    {
//        $diagnosis = diagnosis::all();
//        $id = array();
//        if (count($diagnosis) != 0) {
//            foreach ($diagnosis as $bayar) {
//                $id [] = $bayar->id_diagnosis;
//            }
//            array_multisort(array_map('strlen', $id), $id);
//            $newID = 'DIG' . (substr($id [count($id) - 1], 3, strlen($id [count($id) - 1])) + 1);
//            return $newID;
//        }else{
//            $newID = 'DIG1' ;
//            return $newID;
//        }
//    }
}
