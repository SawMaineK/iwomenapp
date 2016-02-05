<!-- Objectid Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('objectId', 'Objectid:') !!}
	{!! Form::text('objectId', null, ['class' => 'form-control']) !!}
</div>

<!-- Stickerimg Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('stickerImg', 'Stickerimg:') !!}
	{!! Form::file('stickerImg') !!}
</div>

<!-- Stickerimgpath Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('stickerImgPath', 'Stickerimgpath:') !!}
	{!! Form::text('stickerImgPath', null, ['class' => 'form-control']) !!}
</div>

<!-- Stickername Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('stickerName', 'Stickername:') !!}
	{!! Form::text('stickerName', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
