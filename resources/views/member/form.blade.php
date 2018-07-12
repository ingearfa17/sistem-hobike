<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nama Member Baru:</strong>
            {!! Form::text('nama', null, array('placeholder' => 'Nama Member','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Alamat :</strong>
            {!! Form::text('alamat', null, array('placeholder' => 'Alamat','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Jenis Kelamin:</strong>
            {!! Form::select('jenis_kelamin', ['Pria' => 'Pria', 'Wanita' => 'Wanita']) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nomor Telepon:</strong>
            {!! Form::text('telepon', null, array('placeholder' => 'Nomor Telepon','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Pekerjaan :</strong>
            {!! Form::text('pekerjaan', null, array('placeholder' => 'Pekerjaan','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>