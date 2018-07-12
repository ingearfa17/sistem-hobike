@extends('adminlte::page')

@section('title', 'Sistem Hobike')

@section('content_header')
{{-- <h1>Dashboard</h1> --}}


@stop

@section('content')
{{-- <p>You are logged in!</p> --}}
<div class="container">
	@if(\Session::has('success'))
	<div class="alert alert-success">
		{{\Session::get('success')}}
	</div>
	@endif

</div>

{{-- <div id="map"></div>
<script src="https://maps.googleapis.com/maps/api/js" async defer></script>

<script>
  function initMap() {}
</script> --}}

{{-- <div class="row">
  <div class="col-lg-12">
    {{var_dump( json_decode( $response ) )}}
  </div>
  
</div> --}}

<div class="row">
  <div class="col-lg-12">
   <div class="box box-success">
    <div class="box-header ui-sortable-handle" class="center" style="cursor: move;">
     <center>
      <i class="fa fa-edit"></i>
      <h3 class="box-title">Rekapitulasi Data Hobike (Penyewaan Sepeda Di Kota Semarang)</h3>
    </center>
  </div>
</div>
</div>    
</div>

<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-aqua">
      <div class="inner">
        <h3>{{$member->count()}}</h3>

        <p>Data Penyewa</p>
      </div>
      <div class="icon">
        <i class="glyphicon glyphicon-user"></i>
      </div>
      <a href="{{url('/admin/member')}}" class="small-box-footer">Details <i class="glyphicon glyphicon-circle-arrow-right"></i></a>
    </div>
  </div>
  <!-- ./col -->

  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-yellow">
      <div class="inner">
        <h3>{{ $hotel->count()}}</h3>

        <p>Data Hotel</p>
      </div>
      <div class="icon">
        <i class="glyphicon glyphicon-home"></i>
      </div>
      <a href="{{url('/admin/hotel')}}" class="small-box-footer">Details <i class="glyphicon glyphicon-circle-arrow-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-red">
      <div class="inner">
        <h3>{{ $bike->count()}}</h3>

        <p>Data Sepeda</p>
      </div>
      <div class="icon">
        <i class="glyphicon glyphicon-cycle"></i>
      </div>
      <a href="{{url('/admin/bike')}}" class="small-box-footer">Details <i class="glyphicon glyphicon-circle-arrow-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>{{ $bike->count()}}</h3>

        <p>Lokasi Sepeda</p>
      </div>
      <div class="icon">
        <i class="glyphicon glyphicon-cycle"></i>
      </div>
      <a href="{{url('/admin/lokasi')}}" class="small-box-footer">Details <i class="glyphicon glyphicon-circle-arrow-right"></i></a>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-9">
      <div style="width: 1000px; height: 500px">
        {!! Mapper::render() !!}
      </div>
    </div>

    <div class="col-lg-3">
      <div class="small-box bg-green">
        <div class="inner">
          <h3>{{ $sewa->count()}}</h3>
          <p>Total Penyewa</p>
        </div>
        <div class="icon">
          <i class="glyphicon glyphicon-cycle"></i>
        </div>
      </div>
    </div>
  </div>
</div>

</div>

@stop