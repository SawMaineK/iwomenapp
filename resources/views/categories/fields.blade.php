<!-- Objectid Field -->
<div class="form-group col-sm-6 col-lg-4">
	<div class="fg-line"> 
	    {!! Form::label('objectId', 'Objectid:') !!}
		{!! Form::text('objectId', null, ['class' => 'form-control']) !!}
	</div>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6 col-lg-4">
	<div class="fg-line"> 
	    {!! Form::label('name', 'Name:') !!}
		{!! Form::text('name', null, ['class' => 'form-control']) !!}
	</div>
</div>

<!-- Name MM Field -->
<div class="form-group col-sm-6 col-lg-4">
	<div class="fg-line"> 
	    {!! Form::label('name_mm', 'Name MM:') !!}
		{!! Form::text('name_mm', null, ['class' => 'form-control']) !!}
	</div>
</div>

<!-- Image Field -->
<div class="form-group col-sm-6 col-lg-4">
	<div class="fg-line"> 
	    {!! Form::label('image', 'Image:') !!}
		<!-- {!! Form::file('image') !!} -->
		<div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
            <div>
                <span class="btn btn-info btn-file">
                    <span class="fileinput-new">Select image</span>
                    <span class="fileinput-exists">Change</span>
                    <input type="file" name="image">
                </span>
                <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
            </div>
        </div>
	</div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
