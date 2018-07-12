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

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Petugas</th>
            <th>Telepon</th>
            <th>Hotel Tugas</th>
            <th>Tanggal Tugas</th>
            <th>Jam Tugas</th>
            <th>Jam Pergi</th>
            
            
        </tr>
    <tr>
        
    </tr>
    </table>
@endsection