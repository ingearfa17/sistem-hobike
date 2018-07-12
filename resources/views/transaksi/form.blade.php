<div class="box-body">
    {{-- <div class="form-group has-feedback {{ $errors->has('user_id') ? 'has-error' : '' }}">
        {!! Form::label('user_id', 'Nama') !!}
        {!! Form::text('user_id',App\User::pluck('name', 'id'), null, ['class' => 'form-control']) !!}
        {!! $errors->first('user_id', '<p class="help-block">:message</p>')!!}
        
    </div> --}}
    <div class="form-group has-feedback{{ $errors->has('hotel_id') ? 'has-error' : '' }}">
    {!! Form::label('member_id', 'Nama Penyewa') !!}
    {!! Form::select('member_id', App\Member::pluck('nama', 'id')->all(), null, ['class' => 'form-control js-select2']) !!}
    {!! $errors->first('member_id', '<p class="help-block">:message') !!}   
    </div>
    <div class="form-group has-feedback{{ $errors->has('hotel_id') ? 'has-error' : '' }}">
    {!! Form::label('hotel_id_awal', 'Hotel Tempat Sewa') !!}
    {!! Form::select('hotel_id_awal', App\Hotel::pluck('nama', 'id')->all(), null, ['class' => 'form-control js-select2']) !!}
    {!! $errors->first('hotel_id_awal', '<p class="help-block">:message') !!}   
    </div>

    <div class="form-group has-feedback{{$errors->has('bike_id')? 'has-error' :''}}">
    {!! Form::label('bike_id', 'Sepeda') !!}
    {!! Form::select('bike_id', App\Bike::pluck('merek_sepeda', 'id')->all(),null, ['class' => 'form-control js-select2']) !!}
    {!! $errors->first('bike_id', '<p class="help-block">:message') !!}
    </div>

    
</div>
<!-- /.box-body -->
<div class="box-footer">
    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!}
</div>

<script type="text/javascript">

  $("select[nama='hotel_id']").change(function(){

      var hotel_id = $(this).val();

      var token = $("input[nama='_token']").val();

      $.ajax({

          url: "<?php echo route('select-ajax') ?>",

          method: 'POST',

          data: {hotel_id:hotel_id, _token:token},

          success: function(data) {

            $("select[name='bike_id'").html('');

            $("select[name='bike_id'").html(data.options);

          }

      });

  });

</script>

