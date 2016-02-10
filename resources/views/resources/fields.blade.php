<!-- Objectid Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('objectId', 'Objectid:') !!}
	{!! Form::text('objectId', null, ['class' => 'form-control']) !!}
</div>

<!-- Author Img Path Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('author_img_path', 'Author Img Path:') !!}
	{!! Form::text('author_img_path', null, ['class' => 'form-control']) !!}
</div>

<!-- Isallow Field -->
<div class="form-group col-sm-6 col-lg-4">
    <div class="checkbox">
		<label>
	        {!! Form::checkbox('isAllow', 1, true) !!}
	        <i class="input-helper"></i>
	        Isallow
	    </label>
	</div>
</div>

<!-- Resource Author Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('resource_author_id', 'Resource Author Id:') !!}
	{!! Form::text('resource_author_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Resource Author Name Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('resource_author_name', 'Resource Author Name:') !!}
	{!! Form::text('resource_author_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Resource Icon Img Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('resource_icon_img', 'Resource Icon Img:') !!}
	<!-- {!! Form::file('resource_icon_img') !!} -->
	<div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
        <div>
            <span class="btn btn-info btn-file">
                <span class="fileinput-new">Select image</span>
                <span class="fileinput-exists">Change</span>
                <input type="file" name="resource_icon_img">
            </span>
            <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
        </div>
    </div>
</div>

<!-- Resource Title Eng Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('resource_title_eng', 'Resource Title Eng:') !!}
	{!! Form::text('resource_title_eng', null, ['class' => 'form-control']) !!}
</div>

<!-- Resource Title Mm Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('resource_title_mm', 'Resource Title Mm:') !!}
	{!! Form::text('resource_title_mm', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
