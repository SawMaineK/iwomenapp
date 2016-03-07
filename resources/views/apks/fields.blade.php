<!-- Name Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name', 'Name:') !!}
	{!! Form::file('name') !!}
</div>

<!-- Version Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('version_id', 'Version Id:') !!}
	{!! Form::text('version_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Version Name Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('version_name', 'Version Name:') !!}
	{!! Form::text('version_name', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
