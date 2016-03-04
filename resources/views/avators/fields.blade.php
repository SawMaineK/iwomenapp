<!-- Objectid Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('objectId', 'Objectid:') !!}
	{!! Form::text('objectId', null, ['class' => 'form-control']) !!}
</div>

<!-- Avatorimg Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('avatorImg', 'Avatorimg:') !!}
	{!! Form::file('avatorImg') !!}
</div>

<!-- Avatorimgpath Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('avatorImgPath', 'Avatorimgpath:') !!}
	{!! Form::text('avatorImgPath', null, ['class' => 'form-control']) !!}
</div>

<!-- Avatorname Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('avatorName', 'Avatorname:') !!}
	{!! Form::text('avatorName', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
