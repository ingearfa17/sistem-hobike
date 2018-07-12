@extends('adminlte::page')

@section('title', 'Sistem Hobike')

@section('content_header')
  Profil
  <small>Profil Saya</small>

@stop

@section('content')
   <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Profil</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {!! Form::model(auth()->user(), ['url' => url('admin/settings/profile'), 'method' => 'post', 'files' => 'true']) !!}
                <div class="box-body">
                    <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Nama') !!}

                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nama']) !!}
                        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                        {!! Form::label('email', 'Email') !!}

                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
                </div>
                <!-- /.box-footer -->
                {!! Form::close() !!}
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
@stop