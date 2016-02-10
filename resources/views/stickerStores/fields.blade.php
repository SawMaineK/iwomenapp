<!-- Objectid Field -->
<div class="form-group col-sm-6 col-lg-4">
    <div class="fg-line">
        {!! Form::label('objectId', 'Objectid:') !!}
    	{!! Form::text('objectId', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Stickerimg Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('stickerImg', 'Stickerimg:') !!}
	<!-- {!! Form::file('stickerImg') !!} -->
	<div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
        <div>
            <span class="btn btn-info btn-file">
                <span class="fileinput-new">Select image</span>
                <span class="fileinput-exists">Change</span>
                <input type="file" name="stickerImg">
            </span>
            <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
        </div>
    </div>
</div>

<!-- Stickerimgpath Field -->
<div class="form-group col-sm-6 col-lg-4">
    <div class="fg-line">
        {!! Form::label('stickerImgPath', 'Stickerimgpath:') !!}
    	{!! Form::text('stickerImgPath', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Stickername Field -->
<div class="form-group col-sm-6 col-lg-4">
    <div class="fg-line">
        {!! Form::label('stickerName', 'Stickername:') !!}
    	{!! Form::text('stickerName', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
