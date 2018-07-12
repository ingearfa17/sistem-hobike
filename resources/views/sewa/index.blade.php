@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Sistem Hobike | Penyewaan Sepeda di Kota Semarang</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('sewa.create')}}"> Sewa</a>
            <a class="btn btn-danger" href="{{ route('home')}}"> Kembali</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama Member</th>
        <th>Hotel Tempat Sewa</th>
        <th>Id Sepeda</th>
        <th>Hotel Tempat Kembali</th>
        <th>Jam Pinjam</th>
        <th>Jam Kembali</th>
        <th>Tanggal</th>
        <th>Details</th>
    </tr>
    @foreach($sewas as $sewa)
    <tr>
        <td>{{ $sewa->id_sewa}}</td>
        <td>{{ $sewa->memberid}}</td>
        <td>{{ $sewa->hotel_sewa}}</td>
        <td>{{ $sewa->bikeid}}</td>
        <td>{{ $sewa->hotel_kembali}}</td>
        <td>{{ Carbon\Carbon::parse($sewa->created_at)->format("H:i:s")}}</td>
        <td>{{Carbon\Carbon::parse($sewa->updated_at)->format("H:i:s")}}</td>
        <td>{{ Carbon\Carbon::parse($sewa->created_at)->format("Y:m:d")}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('sewa.edit',$sewa->id) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-share-alt"></i></a>
        </td>
    </tr>
    @endforeach
</table>
@endsection