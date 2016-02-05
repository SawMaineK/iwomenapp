<!-- Objectid Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('objectId', 'Objectid:') !!}
	{!! Form::text('objectId', null, ['class' => 'form-control']) !!}
</div>

<!-- Comment Contents Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('comment_contents', 'Comment Contents:') !!}
	{!! Form::text('comment_contents', null, ['class' => 'form-control']) !!}
</div>

<!-- Comment Created Time Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('comment_created_time', 'Comment Created Time:') !!}
	{!! Form::date('comment_created_time', null, ['class' => 'form-control']) !!}
</div>

<!-- Postid Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('postId', 'Postid:') !!}
	{!! Form::text('postId', null, ['class' => 'form-control']) !!}
</div>

<!-- Sticker Img Path Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('sticker_img_path', 'Sticker Img Path:') !!}
	{!! Form::text('sticker_img_path', null, ['class' => 'form-control']) !!}
</div>

<!-- Userid Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('userId', 'Userid:') !!}
	{!! Form::text('userId', null, ['class' => 'form-control']) !!}
</div>

<!-- User Img Path Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('user_img_path', 'User Img Path:') !!}
	{!! Form::text('user_img_path', null, ['class' => 'form-control']) !!}
</div>

<!-- User Name Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('user_name', 'User Name:') !!}
	{!! Form::text('user_name', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
