<!-- Reg Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('reg_id', 'Reg Id:') !!}
	{!! Form::text('reg_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Device Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('device_id', 'Device Id:') !!}
	{!! Form::text('device_id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('user_id', 'User Id:') !!}
	{!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
