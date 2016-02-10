<!-- Objectid Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('objectId', 'Objectid:') !!}
	{!! Form::text('objectId', null, ['class' => 'form-control']) !!}
</div>

<!-- Authorimg Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('authorImg', 'Authorimg:') !!}
	<!-- {!! Form::file('authorImg') !!} -->
    <div class="fileinput fileinput-new" data-provides="fileinput">
        <span class="btn btn-primary btn-file m-r-10">
            <span class="fileinput-new">Select file</span>
            <span class="fileinput-exists">Change</span>
            <input type="file" name="authorImg">
        </span>
        <span class="fileinput-filename"></span>
        <a href="#" class="close fileinput-exists" data-dismiss="fileinput">&times;</a>
    </div>
</div>

<!-- Authorinfoeng Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('authorInfoEng', 'Authorinfoeng:') !!}
	{!! Form::text('authorInfoEng', null, ['class' => 'form-control']) !!}
</div>

<!-- Authorinfomm Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('authorInfoMM', 'Authorinfomm:') !!}
	{!! Form::text('authorInfoMM', null, ['class' => 'form-control']) !!}
</div>

<!-- Authorname Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('authorName', 'Authorname:') !!}
	{!! Form::text('authorName', null, ['class' => 'form-control']) !!}
</div>

<!-- Authortitleeng Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('authorTitleEng', 'Authortitleeng:') !!}
	{!! Form::text('authorTitleEng', null, ['class' => 'form-control']) !!}
</div>

<!-- Authortitlemm Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('authorTitleMM', 'Authortitlemm:') !!}
	{!! Form::text('authorTitleMM', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
