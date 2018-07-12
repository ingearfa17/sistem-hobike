@extends('adminlte::page')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Data Hotel</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('hotel.index') }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama Hotel:</strong>

            {{ $hotel->nama}}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Alamat:</strong>
            {{ $hotel->alamat}}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Kode pos:</strong>
            {{ $hotel->kodepos}}
        </div>
    </div>

</div>

@endsection