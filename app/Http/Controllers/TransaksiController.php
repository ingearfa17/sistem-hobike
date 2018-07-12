<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Sewa;
use App\Hotel;
use App\Bike;
use App\User;
use App\Lokasi;
use DB;
use Illuminate\Database\Eloquent\Model;


class TransaksiController extends Controller
{
	public function index()
	{
        //$sewas = Sewa::all();
		// $sewas = DB::table('sewas')
		// ->join('members','members.id', '=', 'sewas.member_id')
		// ->join('hotels','hotels.id', '=', 'sewas.hotel_id_awal')
		// ->join('bikes','bikes.id', '=', 'sewas.bike_id')
		// ->select('sewas.*', 'members.nama as namamember', 'hotels.nama', 'bikes.kode_sepeda as kodesepeda')
		// ->get();

		$sewas = Sewa::where('hotel_id_kembali', null)->get();
    	// return view('transaksi.kembali', compact('sewas'));

		return view('transaksi.index', compact('sewas'));
        //
	}

	public function create()
	{
		// $hotels = Hotel::orderBy('nama')->get();
		// $bikes = Bike::orderBy('id')->get();
		$hotels = DB::table('hotels')->pluck("nama", "id")->all();
		return view('transaksi.create', compact('hotels'));
	}

	public function show($id)
	{
		$sewas = Sewa::find($id);

		return view('transaksi.show',compact('sewas'));
	}

	public function selectBike(Request $request)
	{
		if ($request->ajax()) {
			$bikes = DB::table('bikes')->where('hotel_id', $request->hotel_id)->pluck("nama", "id")->all();
			$data = view('ajax-select', compact('bikes'))->render();
			return response()->json(['options'=>$data]);
		}
	}

	public function store(Request $request)
	{
		// date_default_timezone_set('Asia/Jakarta');
		request()->validate([
			'member_id' => 'required',
			'bike_id' => 'required',
			'hotel_id_awal' => 'required',


		]);

		Sewa::create($request->all());
		return redirect()->route('sewa.index')
		->with('success','Penyewaan Sepeda Berhasil');
	}

	public function edit($id)
	{
		$sewas = Sewa::find($id);
		// $sewas = DB::table('sewas')
		// ->join('members','members.id', '=', 'sewas.member_id')
		// ->join('hotels','hotels.id', '=', 'sewas.hotel_id_awal')
		// ->join('bikes','bikes.id', '=', 'sewas.bike_id')
		// ->where('sewas.id', '=', $id)
		// ->select('sewas.*', 'members.nama as namamember', 'hotels.nama', 'bikes.id as bikeid')
		// ->first();

		// return view('transaksi.edit2',compact('sewas'));
		// $sewas = Sewa::all();
    	// $sewas = Sewa::where('hotel_id_kembali', null)->get();
		return view('transaksi.edit2', compact('sewas'));
		
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


    	$sewas = \App\Sewa::findOrFail($id);
        $selisih = Carbon::now()->diffInMinutes($sewas->created_at);
        $total = $selisih * 300;
    	// $sewas->member_id = $request->get('member_id');
    	// $sewas->bike_id = $request->get('bike_id');
    	// $sewas->hotel_id_awal = $request->get('hotel_id_awal');
    	$sewas->hotel_id_kembali = $request->get('hotel_id_kembali');
    	$sewas->total = $total;
    	$sewas->save();
    	return redirect()->route('sewa.kembali', compact('sewas', 'total', 'selisih'));  	

    	
    }


    public function kembali()
    {
    	$sewas = Sewa::where('hotel_id_kembali', '<>', null)->get();
    	// $sewas = Sewa::where('hotel_id_kembali', null)->get();
    	return view('transaksi.kembali2', compact('sewas'));

    }

    public function absensi()
    {
    	return view('transaksi.absensi');
    }

}
