{{-- @section('js')
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#showgambar').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#inputgambar').change(function (){
        readURL(this);
    });
    
</script>
@stop
 --}}
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
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('bike.index') }}"> Back</a>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add New Sepeda</h3>
            </div>

            {!! Form::open(array('route' => 'bike.store','method'=>'POST', 'files'=>true)) !!}
            @include('bike.form')
            {!! Form::close() !!}
        </div>
        

    </div>
</div>





    {{-- {!! Form::open(array('route' => 'bike.store','method'=>'POST')) !!}
         @include('bike.form')
         {!! Form::close() !!} --}}

         @endsection