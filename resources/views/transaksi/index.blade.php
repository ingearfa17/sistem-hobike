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

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Member</th>
                <th>Hotel Tempat Sewa</th>
                <th>Kode Sepeda</th>
                <th>Jam Pinjam</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="table-striped">
            @php(
                $no = 1
            )
            @foreach($sewas as $sewa)
            <tr>
                <td>{{ $no++}}</td>
                <td>{{ $sewa->member->nama}}</td>
                <td>{{ $sewa->hotelAwal->nama}}</td>
                <td>{{ $sewa->bike->kode_sepeda}}</td>
                <td>{{ Carbon\Carbon::parse($sewa->created_at)->format("H:i:s")}}</td>
                <td>
                    <a class="btn btn-info" href="{{ route('sewa.edit',$sewa->id) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-share-alt"></i></a>
                </td>
            </tr>
            @endforeach
            
        </tbody>
        
    </table>
    
</div>

@endsection