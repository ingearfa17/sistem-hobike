@extends('adminlte::page')

@section('content')

<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2> Show Data Hotel</h2>
		</div>
		<div class="pull-right">
			<a class="btn btn-primary" href="{{ route('bike.index') }}"> Back</a>
		</div>
	</div>
</div>


<div class="row">
	<!-- Id Field -->
	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Id Sepeda:</strong>

			{{ $bike->id}}
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Kode Sepeda:</strong>

			{{ $bike->kode_sepeda}}
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Jenis Sepeda:</strong>

			{{ $bike->jenis_sepeda}}
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Merek Sepeda:</strong>
			{{ $bike->merek_sepeda}}
		</div>
	</div>

	<div class="col-xs-12 col-sm-12 col-md-12">
		<div class="form-group">
			<strong>Foto:</strong>
			{{-- {{ $bike->image}} --}}
			<img class="card-img-top" src="{{url('images/'.$bike->image)}}" alt="{{$bike->image}}">
			{{-- <img src="{{ url('storage/images/'.$bike->image)}}" height="30px" width="30px"> --}}
			{{-- <img src="{{ storage_path().'/images/'.$bike->image }}" alt="" title=""></a> --}}
			{{-- <img src="storage/images/{{$bike['image']}}" height="30px" width="30px"> --}}
			{{-- <img src="{{ asset("images/$bike->image")}}"> --}}
		</div>
	</div>



	<!-- Created At Field -->
	<div class="col-xs-12 col-sm-12 col-md-12">
		{!! Form::label('created_at', 'Created At:') !!}
		<p>{!! $bike->created_at !!}</p>
	</div>

	<!-- Updated At Field -->
	<div class="col-xs-12 col-sm-12 col-md-12">
		{!! Form::label('updated_at', 'Updated At:') !!}
		<p>{!! $bike->updated_at !!}</p>
	</div>
</div>

@endsection