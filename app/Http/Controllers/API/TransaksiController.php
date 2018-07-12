<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sewa;
use Carbon\Carbon;

use DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sewas = Sewa::where('hotel_id_kembali', null)->get();
        // return view('transaksi.kembali', compact('sewas'));

        //return view('transaksi.index', compact('sewas'));
        return response()->json([
            'pesan' => 'berhasil',
            'sewas' => $sewas
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
        // request()->validate([
        //     'member_id' => 'required',
        //     'bike_id' => 'required',
        //     'hotel_id_awal' => 'required',


        // ]);

        // Sewa::create($request->all());

        // return redirect()->route('sewa.index')
        // ->with('success','Penyewaan Sepeda Berhasil');
        $sewas = new Sewa;
        $sewas->member_id = $request->member_id;
        $sewas->bike_id = $request->bike_id;
        $sewas->hotel_id_awal = $request->hotel_id_awal;
        $sewas->save();

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
        // $sewas = Sewa::find($id);
        $sewas = DB::table('sewas')
        ->join('members','members.id', '=', 'sewas.member_id')
        ->join('hotels as hotelAwal','hotelAwal.id', '=', 'sewas.hotel_id_awal')
        ->join('hotels as hotelKembali','hotelKembali.id', '=', 'sewas.hotel_id_kembali')
        ->join('bikes','bikes.id', '=', 'sewas.bike_id')
        ->where('sewas.id', '=', $id)
        ->select('sewas.*', 'members.nama as namamember', 'hotelAwal.nama as hotelAwal', 'hotelKembali.nama as hotelKembali', 'bikes.kode_sepeda as bikeid')
        ->first();
        return response()->json([
            'pesan' => 'berhasil nih',
            'sewas' => $sewas
        ], 200);
    }

    public function showSewa($id)
    {
        // $sewas = Sewa::find($id);
        $sewas = DB::table('sewas')
        ->join('members','members.id', '=', 'sewas.member_id')
        ->join('hotels as hotelAwal','hotelAwal.id', '=', 'sewas.hotel_id_awal')
        ->join('hotels as hotelKembali','hotelKembali.id', '=', 'sewas.hotel_id_kembali')
        ->join('bikes','bikes.id', '=', 'sewas.bike_id')
        ->where('sewas.id', '=', $id, '&&', 'hotel_id_kembali', '<>', null)
        ->select('sewas.*', 'members.nama as namamember', 'hotelAwal.nama as hotelAwal', 'hotelKembali.nama as hotelKembali', 'bikes.kode_sepeda as bikeid')
        ->first();

        // $sewas = Sewa::where('hotel_id_kembali', '<>', null)->first();
        return response()->json([
            'pesan' => 'berhasil nih',
            'sewas' => $sewas
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
        // $bike = Bike::find($id);
        // $bike->kode_sepeda = $request->kode_sepeda;
        // $bike->jenis_sepeda = $request->jenis_sepeda;
        // $bike->merek_sepeda = $request->merek_sepeda;

        $sewas = \App\Sewa::findOrFail($id);
        $selisih = Carbon::now()->diffInMinutes($sewas->created_at);
        $total = $selisih * 300;
        // $sewas->member_id = $request->get('member_id');
        // $sewas->bike_id = $request->get('bike_id');
        // $sewas->hotel_id_awal = $request->get('hotel_id_awal');
        $sewas->hotel_id_kembali = $request->get('hotel_id_kembali');
        $sewas->total = $total;
        $sewas->save();

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

    public function kembali()
    {
        // $sewas = Sewa::all();
        $sewas = Sewa::where('hotel_id_kembali', '<>', null)->get();
        // $sewas = Sewa::where('hotel_id_kembali', null)->get();
        //return view('transaksi.kembali2', compact('sewas'));
        return response()->json([
            'pesan' => 'berhasil',
            'sewas' => $sewas
        ], 200);


    }
}


// SQLSTATE[23000]: Integrity constraint violation: 1452 Cannot add or update a child row: a foreign key constraint fails (`sistemho`.`sewas`, CONSTRAINT `sewas_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON UPDATE CASCADE) (SQL: insert into `sewas` (`member_id`, `bike_id`, `hotel_id_awal`, `updated_at`, `created_at`) values (2, 5, 2, 2018-07-10 14:24:15, 2018-07-10 14:24:15))
