@extends('adminlte::page')

@section('content')

@if (count($errors) < 0)
<div class="alert alert-danger">
	<strong>Whoops!</strong> There were some problems with your input.<br><br>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Tambah Transaksi Penyewaan</h3>
			</div>
			{!! Form::open(array('route' => 'sewa.store','method'=>'POST')) !!}
			@include('sewa.form')
			{!! Form::close() !!}

		</div>
	</div>
</div>
@endsection

		{{-- <div class="pull-right">
			<a class="btn btn-primary" href="{{ route('transaksi.index') }}"> Back</a>
		</div> --}}