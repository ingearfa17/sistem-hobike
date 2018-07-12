<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bike;

class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bikes = Bike::all();
        return response()->json([
            'bikes' => $bikes
        ], 200);
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
        $bike = new Bike;
        $bike->kode_sepeda = $request->kode_sepeda;
        $bike->jenis_sepeda = $request->jenis_sepeda;
        $bike->merek_sepeda = $request->merek_sepeda;
        $bike->save();

        return response()->json([
            'pesan' => 'Penyewaan Sukses'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bikes = Bike::find($id);
        return response()->json([
            'pesan' => 'berhasil',
            'bikes' => $bikes
        ], 200);
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
        $bike = Bike::find($id);
        $bike->kode_sepeda = $request->kode_sepeda;
        $bike->jenis_sepeda = $request->jenis_sepeda;
        $bike->merek_sepeda = $request->merek_sepeda;

        return response()->json([
            'pesan' => 'data berhasil di edit'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
