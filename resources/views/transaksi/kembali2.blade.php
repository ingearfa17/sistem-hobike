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

<div class="table-responsive">
    <table class="table table-striped">
        <tr class="info">
            <th>No</th>
            <th>Nama Member</th>
            <th>Id Sepeda</th>
            <th>Hotel Sewa</th>
            <th>Hotel Kembali</th>
            <th>Jam Pinjam</th>
            <th>Jam Kembali</th>
            <th>Selisih</th>
            <th>Tanggal</th>
            <th>Total</th>
            <th>Details</th>
        </tr>
        @php(
            $no = 1
        )
        @foreach($sewas as $sewa)

        <tr>
        <td>{{ $no++}}</td>
        <td>{{ $sewa->member->nama}}</td>
        <td>{{ $sewa->bike->kode_sepeda}}</td>
        <td>{{ $sewa->hotelAwal->nama}}</td>
        <td>{{ $sewa->hotelKembali->nama}}</td>
        <td>{{ Carbon\Carbon::parse($sewa->created_at)->format("H:i:s A")}}</td>
        <td>{{ Carbon\Carbon::parse($sewa->updated_at)->format("H:i:s A")}}</td>
        <td>{{ Carbon\Carbon::parse($sewa->updated_at)->format("H:i:s A")}}</td>
        <td>{{Carbon\Carbon::parse($sewa->created_at)->format("l jS \\of F Y")}}</td>
        <td>{{$sewa->total}}</td>
        <td><a class="btn btn-info" href="{{ route('sewa.show',$sewa->id) }}">Details</a></td>
        </tr>
        @endforeach
        </table>

        </div>


        @endsection