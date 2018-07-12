@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Sistem Hobike | Penyewaan Sepeda di Kota Semarang</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-danger" href="{{ route('home')}}"> Kembali</a>
        </div>
    </div>
</div>



    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <?php

    date_default_timezone_set('Asia/Jakarta');
    $mulai=Carbon\Carbon::parse($sewas->created_at)->format("H:i:s");
    $selesai=Carbon\Carbon::parse($sewas->updated_at)->format("H:i:s");
    //list digunkaan untuk menangkap hasil
    //explode untuk membetuk array  dengan menhilangkan : pd contoh ini
    list($jam,$menit,$detik)=explode(':',$mulai);

    $buatWaktuMulai=mktime($jam,$menit,$detik,1,1,1);

    list($jam,$menit,$detik)=explode(':',$selesai);
    //-----membentuk waktu selesai
    $buatWaktuSelesai=mktime($jam,$menit,$detik,1,1,1);
    $selisihDetik=$buatWaktuSelesai-$buatWaktuMulai;

    $totalharga=$selisihDetik * 1.5;
    //echo" Mulai : $mulai </br>";
    //echo" Selesai  $selesai </br>";
    //echo" Waktu $selisihDetik detik </br>";

    //echo "harga yang harus dibayar $totalharga";

    ?>

   


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Member</th>
            <th>Id Sepeda</th>
            <th>Hotel Sewa</th>
            <th>Hotel Kembali</th>
            <th>Jam Pinjam</th>
            <th>Jam Kembali</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Details</th>
        </tr>

        @foreach($sewas as $sewa)
        <tr>
            <td>{{ $sewa->id}}</td>
            <td>{{ $sewa->member->nama}}</td>
            <td>{{ $sewa->bike->kode_sepeda}}</td>
            <td>{{ $sewa->hotelAwal->nama}}</td>
            <td>{{ $sewa->hotelKembali->nama}}</td>
            {{-- {!! old('nama', optional($sewa)->nama)!!} --}}
            <td>{{ Carbon\Carbon::parse($sewa->created_at)->format("H:i:s A")}}</td>
            <td>{{ Carbon\Carbon::parse($sewa->updated_at)->format("H:i:s A")}}</td>
            <td>{{Carbon\Carbon::parse($sewa->created_at)->format("l jS \\of F Y")}}</td>
            <td>{{$sewa->total}}</td>
            <td><a class="btn btn-info" href="{{-- {{ route('bike.show',$bike->id) }} --}}">Details</a></td>
        </tr>
        @endforeach
    </table>
    @endsection