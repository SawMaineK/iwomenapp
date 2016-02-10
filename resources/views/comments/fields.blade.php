<!-- Objectid Field -->
<div class="form-group col-sm-6 col-lg-4">
    <div class="fg-line">
        {!! Form::label('objectId', 'Objectid:') !!}
    	{!! Form::text('objectId', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Comment Contents Field -->
<div class="form-group col-sm-6 col-lg-4">
    <div class="fg-line">
        {!! Form::label('comment_contents', 'Comment Contents:') !!}
    	{!! Form::text('comment_contents', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Comment Created Time Field -->
<div class="form-group col-sm-6 col-lg-4">
    <div class="fg-line">
        {!! Form::label('comment_created_time', 'Comment Created Time:') !!}
    	<!-- {!! Form::date('comment_created_time', null, ['class' => 'form-control']) !!} -->
        <div class="input-group form-group">
            <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                <div class="dtp-container fg-line">
                <input type='text' name="updatedAt" class="form-control date-picker" placeholder="dd/mm/yyyy">
            </div>
        </div>
    </div>
</div>

<!-- Postid Field -->
<div class="form-group col-sm-6 col-lg-4">
    <div class="fg-line">
        {!! Form::label('postId', 'Postid:') !!}
    	{!! Form::text('postId', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Sticker Img Path Field -->
<div class="form-group col-sm-6 col-lg-4">
    <div class="fg-line">
        {!! Form::label('sticker_img_path', 'Sticker Img Path:') !!}
    	{!! Form::text('sticker_img_path', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Userid Field -->
<div class="form-group col-sm-6 col-lg-4">
    <div class="fg-line">
        {!! Form::label('userId', 'Userid:') !!}
    	{!! Form::text('userId', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- User Img Path Field -->
<div class="form-group col-sm-6 col-lg-4">
    <div class="fg-line">
        {!! Form::label('user_img_path', 'User Img Path:') !!}
    	{!! Form::text('user_img_path', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- User Name Field -->
<div class="form-group col-sm-6 col-lg-4">
    <div class="fg-line">
        {!! Form::label('user_name', 'User Name:') !!}
    	{!! Form::text('user_name', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
