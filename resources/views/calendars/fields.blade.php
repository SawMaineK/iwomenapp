<!-- Objectid Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('objectId', 'Objectid:') !!}
	{!! Form::text('objectId', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('title', 'Title:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Mm Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('title_mm', 'Title Mm:') !!}
	{!! Form::text('title_mm', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('description', 'Description:') !!}
	{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Mm Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('description_mm', 'Description Mm:') !!}
	{!! Form::textarea('description_mm', null, ['class' => 'form-control']) !!}
</div>

<!-- Location Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('location', 'Location:') !!}
	{!! Form::text('location', null, ['class' => 'form-control']) !!}
</div>

<!-- Location Mm Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('location_mm', 'Location Mm:') !!}
	{!! Form::text('location_mm', null, ['class' => 'form-control']) !!}
</div>

<!-- Start Date Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('start_date', 'Start Date:') !!}
	{!! Form::date('start_date', null, ['class' => 'form-control']) !!}
</div>

<!-- End Date Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('end_date', 'End Date:') !!}
	{!! Form::date('end_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Start Time Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('start_time', 'Start Time:') !!}
	{!! Form::text('start_time', null, ['class' => 'form-control']) !!}
</div>

<!-- End Time Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('end_time', 'End Time:') !!}
	{!! Form::text('end_time', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
