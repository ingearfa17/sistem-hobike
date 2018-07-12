@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Sistem Hobike | Penyewaan Sepeda di Kota Semarang</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('member.create') }}"> Tambah Daftar Member</a>
                <a class="btn btn-danger" href="{{ route('home')}}"> Kembali</a>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>No Telepon</th>
            <th>Pekerjaan</th>
            <th width="280px">Action</th>
        </tr>

    @foreach ($members as $member)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $member->nama}}</td>
        <td>{{ $member->alamat}}</td>
        <td>{{ $member->jenis_kelamin}}</td>
        <td>{{ $member->telepon}}</td>
        <td>{{ $member->pekerjaan}}</td>
        
        <td>
            <a class="btn btn-info" href="{{ route('member.show',$member->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('member.edit',$member->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['member.destroy', $member->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </table>

    {!! $members->links() !!}

@endsection