<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bike;
use App\Hotel;
use App\Lokasi;
use DB;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	// $bikes = DB::table('bike_hotel')
    	// ->join('bikes','bikes.id', '=', 'bike_hotel.bike_id')
    	// ->join('hotels','hotels.id', '=', 'bike_hotel.hotel_id')
    	// ->select('bike_hotel.*', 'bikes.kode_sepeda as kode_sepeda', 'bikes.jenis_sepeda as jenis', 'bikes.merek_sepeda as mereks', 'hotels.nama')
    	// ->get();

    	// return view('lokasi.index', compact('bikes'));
        $locations = DB::table('hotels')->get();
        $status = Lokasi::all();
        // return view('gmaps',compact('locations'));
        $hotels = Hotel::with('bikes')->get();
        return view('lokasi.index', compact('hotels', 'locations', 'status'));

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
