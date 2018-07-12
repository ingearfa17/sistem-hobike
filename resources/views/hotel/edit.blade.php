@extends('adminlte::page')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Hotel</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('hotel.index') }}"> Back</a>
            </div>
        </div>
    </div>


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::model($hotel, ['method' => 'PATCH','route' => ['hotel.update', $hotel->id]]) !!}
        @include('hotel.form')
    {!! Form::close() !!}


@endsection