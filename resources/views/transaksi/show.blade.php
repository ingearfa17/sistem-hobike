@extends('adminlte::page')

@section('content')

<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="pull-left">
			<h2> Show Data Hotel</h2>
		</div>
		<div class="pull-right">
			<a class="btn btn-primary" href="{{ route('sewa.index') }}"> Back</a>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Detail Transaksi</h3>
			</div>
			<div class="box-body">
				<!-- Id Field -->
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>No Sewa:</strong>

						{{ $sewas->id}}
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Nama Penyewa:</strong>

						{{ $sewas->member->nama}}
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Id Sepeda:</strong>

						{{ $sewas->bike->kode_sepeda}}
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Hotel Sewa:</strong>
						{{ $sewas->hotelAwal->nama}}
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Hotel Kembali:</strong>
						{{ $sewas->hotelKembali->nama}}
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Total Harga:</strong>
						{{ $sewas->total}}
					</div>
				</div>

				<!-- Created At Field -->
				<div class="col-xs-12 col-sm-12 col-md-12">
					{!! Form::label('created_at', 'Waktu Pinjam:') !!}
					<p>{!! $sewas->created_at !!}</p>
				</div>

				<!-- Updated At Field -->
				<div class="col-xs-12 col-sm-12 col-md-12">
					{!! Form::label('updated_at', 'Waktu Pengembalian:') !!}
					<p>{!! $sewas->updated_at !!}</p>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					{!! Form::label('updated_at', 'Tangal:') !!}
					<p>{!! $sewas->updated_at->format("l jS \\of F Y") !!}</p>
				</div>
				
			</div>
			
			
		</div>
	</div>
</div>

@endsection