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
                    <h3 class="box-title">Profil</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tr>
                            <td class="text-muted">Name</td>
                            <td>{{ auth()->user()->name }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Email</td>
                            <td>{{ auth()->user()->email }}</td>
                        </tr>
                        
                        <tr>
                            <td class="text-muted">Login Terakhir</td>
                            <td>{{ auth()->user()->last_login }}</td>
                        </tr>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                  <a href="{{ url('admin/settings/profile/edit') }}" class="btn btn-info">Ubah</a>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
@stop