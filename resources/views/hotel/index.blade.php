@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Sistem Hobike | Penyewaan Sepeda di Kota Semarang</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('hotel.create') }}"> Tambah Daftar Hotel</a>
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
            <th>Nama</th>
            <th>Alamat</th>
            <th>Kode Pos</th>
            <th width="280px">Action</th>
        </tr>

    @foreach ($hotels as $hotel)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $hotel->nama}}</td>
        <td>{{ $hotel->alamat}}</td>
        <td>{{ $hotel->kodepos}}</td>
        <td>
            <a class="btn btn-info" href="{{ route('hotel.show',$hotel->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('hotel.edit',$hotel->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['hotel.destroy', $hotel->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>

    {!! $hotels->links() !!}

@endsection