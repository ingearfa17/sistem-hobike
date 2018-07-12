@extends('adminlte::page')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Sistem Hobike | Penyewaan Sepeda di Kota Semarang</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('bike.create') }}"> Tambah Daftar Sepeda</a>
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
        <th>Jenis Sepeda</th>
        <th>Merek</th>
        <th>Lokasi</th>
        <th>Status</th>
    </tr>

    @foreach ($bikes as $bike)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $bike->jenis_sepeda}}</td>
        <td>{{ $bike->merek_sepeda}}</td>
        <td>{{ $bike->nama}}</td>
        <td>{{ $bike->status}}</td>
    </tr>
    @endforeach
</table>

{!! $bikes->links() !!}

@endsection