<?php

namespace App\Http\Controllers;

use App\Spesialis;
use Illuminate\Http\Request;

class SpesialisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spesialis = Spesialis::all();
        return view('admin.m_spesialis', compact('spesialis'));
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
        $spesialis = Spesialis::create([
            'spesialis' => $request->spesialis,
        ]);

        $dataspesialis = Spesialis::all();

        if ($spesialis){

            $response["error"] = false;
            $response["message"] = "Berhasil";
            $response["data"] = compact('dataspesialis');
            return response()->json($response, 201);

        }else{
            $response["error"] = true;
            $response["message"] = "Gagal";
            $response["data"] = compact('dataspesialis');
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
        $updates = Spesialis::find($id)->update([
            'spesialis' => $request->spesialis
        ]);

        $dataspesialis = Spesialis::all();
        if ($updates) {
            $response["error"] = false;
            $response["message"] = "Berhasil";
            $response["data"] = compact('dataspesialis');
            return response()->json($response, 200);
        } else {
            $response["error"] = true;
            $response["message"] = "Gagal";
            $response["data"] = compact('dataspesialis');
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
        $delete = Spesialis::find($id);
        $delete->delete();

        $dataspesialis = Spesialis::all();

        $response["error"] = false;
        $response["message"] = "Berhasil";
        $response["data"] = compact('dataspesialis');
        return response()->json($response, 200);
    }
}
