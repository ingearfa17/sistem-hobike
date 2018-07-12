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
			{{-- {!! Form::open(array('route' => 'sewa.store','method'=>'POST')) !!}
			@include('transaksi.form')
			{!! Form::close() !!} --}}
			<div class="box-body">
				{!! Form::open(array('url'=>'/admin/sewa', 'method'=>'POST'))!!}

				<div class="form-group has-feedback{{ $errors->has('member_id') ? ' has-error' : '' }}">
					{!! Form::label('member_id', 'Nama Penyewa') !!}

					{!! Form::select('member_id', App\Member::pluck('nama','id')->all(), null, ['class' => 'form-control js-select2']) !!}
					{!! $errors->first('member_id', '<p class="help-block">:message</p>') !!}
				</div>

				<div class="form-group has-feedback{{ $errors->has('hotel_id_awal') ? ' has-error' : '' }}">
					{!! Form::label('hotel_id_awal', 'Hotel Sewa Sepeda') !!}

					{!! Form::select('hotel_id_awal', App\Hotel::pluck('nama','id')->all(), null, ['class' => 'form-control js-select2']) !!}
					{!! $errors->first('hotel_id_awal', '<p class="help-block">:message</p>') !!}
				</div>

				<div class="form-group has-feedback{{ $errors->has('bike_id') ? ' has-error' : '' }}">
					{!! Form::label('bike_id', 'Kode Sepeda') !!}

					{!! Form::select('bike_id', App\Bike::pluck('merek_sepeda','id')->all(), null, ['class' => 'form-control js-select2']) !!}
					{!! $errors->first('bike_id', '<p class="help-block">:message</p>') !!}
				</div>
				{!! Form::button('<i class="fa fa-plus-square"></i>'.' Simpan', array('type'=>'submit', 'class'=>'btn btn-primary'))!!}
				
			</div>

{!! Form::close()!!} 

		</div>
	</div>
</div>
@endsection

		{{-- <div class="pull-right">
			<a class="btn btn-primary" href="{{ route('transaksi.index') }}"> Back</a>
		</div> --}}