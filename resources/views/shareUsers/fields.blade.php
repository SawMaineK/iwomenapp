<!-- User Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('user_id', 'User Id:') !!}
	{!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Share Objectid Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('share_objectId', 'Share Objectid:') !!}
	{!! Form::text('share_objectId', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
