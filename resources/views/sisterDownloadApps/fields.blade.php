<!-- Objectid Field -->
<div class="row">
<div class="form-group col-sm-6 col-lg-4">
    <div class="fg-line">
        {!! Form::label('objectId', 'Objectid:') !!}
    	{!! Form::text('objectId', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- App Img Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('app_img', 'App Img:') !!}
	<!-- {!! Form::file('app_img') !!} -->
	<div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
        <div>
            <span class="btn btn-info btn-file">
                <span class="fileinput-new">Select image</span>
                <span class="fileinput-exists">Change</span>
                <input type="file" name="app_img">
            </span>
            <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
        </div>
    </div>
</div>

<!-- App Link Field -->
<div class="form-group col-sm-6 col-lg-4">
    <div class="fg-line">
        {!! Form::label('app_link', 'App Link:') !!}
    	{!! Form::text('app_link', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- App Name Field -->
<div class="form-group col-sm-6 col-lg-4">
    <div class="fg-line">
        {!! Form::label('app_name', 'App Name:') !!}
    	{!! Form::text('app_name', null, ['class' => 'form-control']) !!}
    </div>
</div>
</div>
<!-- App Package Name Field -->
<div class="form-group col-sm-6 col-lg-4">
    <div class="fg-line">
        {!! Form::label('app_package_name', 'App Package Name:') !!}
    	{!! Form::text('app_package_name', null, ['class' => 'form-control']) !!}
    </div>
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


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
