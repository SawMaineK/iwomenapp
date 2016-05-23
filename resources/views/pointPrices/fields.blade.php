<!-- Point Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('point', 'Point:') !!}
	{!! Form::text('point', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('price', 'Price:') !!}
	{!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
