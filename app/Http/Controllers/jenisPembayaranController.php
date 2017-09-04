<?php

namespace App\Http\Controllers;

use App\jenisPembayaran;
use Illuminate\Http\Request;

class jenisPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisPembayaran = jenisPembayaran::all();
        return view('admin.m_jenis_pembayaran', compact('jenisPembayaran'));
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
        $jenisPembayaran = jenisPembayaran::create([
            'jenis_pembayaran' => $request->jenis_pembayaran
        ]);

        $dataPembayaran = jenisPembayaran::all();

        if ($jenisPembayaran){
            $response["error"] = false;
            $response["message"] = "Berhasil";
            $response["data"] = compact('dataPembayaran');
            return response()->json($response, 201);
        }else{
            $response["error"] = true;
            $response["message"] = "Berhasil";
            $response["data"] = compact('dataPembayaran');
            return response()->json($response, 501);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $updates = jenisPembayaran::find($id)->update([
            'jenis_pembayaran' => $request->jenis_pembayaran
        ]);

        $dataPembayaran = jenisPembayaran::all();

        if ($updates){
            $response["error"] = false;
            $response["message"] = "Berhasil";
            $response["data"] = compact('dataPembayaran');
            return response()->json($response, 200);
        }else{
            $response["error"] = true;
            $response["message"] = "Berhasil";
            $response["data"] = compact('dataPembayaran');
            return response()->json($response, 501);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = jenisPembayaran::find($id);
        $delete->delete();

        $dataPembayaran = jenisPembayaran::all();

        $response["error"] = false;
        $response["message"] = "Berhasil";
        $response["data"] = compact('dataPembayaran');
        return response()->json($response, 200);
    }

    private function newID()
    {
        $jenisPembayaran = jenisPembayaran::all();
        $id = array();
        if (count($jenisPembayaran) != 0) {
            foreach ($jenisPembayaran as $bayar) {
                $id [] = $bayar->id_pembayaran;
            }
            array_multisort(array_map('strlen', $id), $id);
            $newID = 'BYR' . (substr($id [count($id) - 1], 3, strlen($id [count($id) - 1])) + 1);
            return $newID;
        }else{
            $newID = 'BYR1' ;
            return $newID;
        }
    }
}
