<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kembali;
use DB;

class KembaliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sewas = DB::table('kembali')
        ->join('sewas','sewas.id', '=', 'kembali.sewa_id')
        ->join('hotels','hotels.id', '=', 'kembali.hotel_id_kembali')
        // ->select('kembali.*', 'sewas.id as id_sewa', 'sewas.member_id as memberid', 'sewas.hotel_id_awal as hotel_sewa', 'hotels.nama as hotel_kembali', 'sewas.bike_id as bikeid')
        ->select('kembali.*', 'sewas.id as id_sewa', 'sewas.member_id as memberid', 'sewas.hotel_id_awal as hotel_sewa', 'hotels.nama as hotel_kembali', 'sewas.bike_id as bikeid')
        ->get();
        return view('sewa.index', compact('sewas'));
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
        //
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
        //
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
