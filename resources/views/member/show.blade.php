@extends('adminlte::page')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Data Member</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('member.index') }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama Member:</strong>

            {{ $member->nama}}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Alamat :</strong>
            {{ $member->alamat}}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Telepon</strong>

            {{ $member->telepon}}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Pekerjaan :</strong>
            {{ $member->pekerjaan}}
        </div>
    </div>



    
</div>

@endsection