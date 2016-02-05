<!-- Objectid Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('objectId', 'Objectid:') !!}
	{!! Form::text('objectId', null, ['class' => 'form-control']) !!}
</div>

<!-- App Img Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('app_img', 'App Img:') !!}
	{!! Form::file('app_img') !!}
</div>

<!-- App Link Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('app_link', 'App Link:') !!}
	{!! Form::text('app_link', null, ['class' => 'form-control']) !!}
</div>

<!-- App Name Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('app_name', 'App Name:') !!}
	{!! Form::text('app_name', null, ['class' => 'form-control']) !!}
</div>

<!-- App Package Name Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('app_package_name', 'App Package Name:') !!}
	{!! Form::text('app_package_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Isallow Field -->
<div class="form-group col-sm-6 col-lg-4">
    <div class="checkbox">
		<label>{!! Form::checkbox('isAllow', 1, true) !!}Isallow</label>
	</div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
