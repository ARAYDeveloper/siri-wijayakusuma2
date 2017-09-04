<?php

namespace App\Http\Controllers;

use App\jenisPelayanan;
use function foo\func;
use Illuminate\Http\Request;

class jenisPelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisLayanan = jenisPelayanan::all();
        return view('admin.m_jenis_pelayanan', compact('jenisLayanan'));
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
        $layanan = jenisPelayanan::create([
            'jenis_pelayanan' => $request->jenis_layanan,
        ]);

        $datalayanan = jenisPelayanan::all();

        if ($layanan){

            $response["error"] = false;
            $response["message"] = "Berhasil";
            $response["data"] = compact('datalayanan');
            return response()->json($response, 201);

        }else{
            $response["error"] = true;
            $response["message"] = "Gagal";
            $response["data"] = compact('datalayanan');
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
        $updates = jenisPelayanan::find($id)->update([
            'jenis_pelayanan' => $request->jenis_layanan
        ]);

        $datalayanan = jenisPelayanan::all();
        if ($updates){
            $response["error"] = false;
            $response["message"] = "Berhasil";
            $response["data"] = compact('datalayanan');
            return response()->json($response, 200);
        }else{
            $response["error"] = true;
            $response["message"] = "Gagal";
            $response["data"] = compact('datalayanan');
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
        $delete = jenisPelayanan::find($id);
        $delete->delete();

        $datalayanan = jenisPelayanan::all();

        $response["error"] = false;
        $response["message"] = "Berhasil";
        $response["data"] = compact('datalayanan');
        return response()->json($response, 200);
    }

//    private function newID()
//    {
//        $jenisLayanan = jenisPelayanan::all();
//        $id = array();
//        if (count($jenisLayanan) != 0) {
//            foreach ($jenisLayanan as $layanan) {
//                $id [] = $layanan->id_layanan;
//            }
//            array_multisort(array_map('strlen', $id), $id);
//            $newID = 'LYN' . (substr($id [count($id) - 1], 3, strlen($id [count($id) - 1])) + 1);
//            return $newID;
//        }else{
//            $newID = 'LYN1' ;
//            return $newID;
//        }
//    }
}
