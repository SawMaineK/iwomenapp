<!-- Post Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('post_id', 'Post Id:') !!}
	{!! Form::text('post_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Mm Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('name_mm', 'Name Mm:') !!}
	{!! Form::text('name_mm', null, ['class' => 'form-control']) !!}
</div>

<!-- Links Path Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('links_path', 'Links Path:') !!}
	{!! Form::file('links_path') !!}
</div>

<!-- Uploaded Date Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('uploaded_date', 'Uploaded Date:') !!}
	{!! Form::text('uploaded_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Isallow Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('isAllow', 'Isallow:') !!}
	{!! Form::text('isAllow', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
