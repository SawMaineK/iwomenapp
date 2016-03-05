<!-- Objectid Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('objectId', 'Objectid:') !!}
	{!! Form::text('objectId', null, ['class' => 'form-control']) !!}
</div>

<!-- Audiofile Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('audioFile', 'Audiofile:') !!}
	<div class="fileinput fileinput-new" data-provides="fileinput">
        <span class="btn btn-primary btn-file m-r-10">
            <span class="fileinput-new">Select file</span>
            <span class="fileinput-exists">Change</span>
            <input type="file" name="audioFile">
        </span>
        <span class="fileinput-filename"></span>
        <a href="#" class="close fileinput-exists" data-dismiss="fileinput">&times;</a>
    </div>
</div>

<!-- Authorid Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('authorId', 'Authorid:') !!}
	{!! Form::text('authorId', null, ['class' => 'form-control']) !!}
</div>

<!-- Comment Count Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('comment_count', 'Comment Count:') !!}
	{!! Form::number('comment_count', null, ['class' => 'form-control']) !!}
</div>

<!-- Content Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('content', 'Content:') !!}
	{!! Form::text('content', null, ['class' => 'form-control']) !!}
</div>

<!-- Contenttype Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('contentType', 'Contenttype:') !!}
	{!! Form::text('contentType', null, ['class' => 'form-control']) !!}
</div>

<!-- Content Mm Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('content_mm', 'Content Mm:') !!}
	{!! Form::text('content_mm', null, ['class' => 'form-control']) !!}
</div>

<!-- Credit Link Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('credit_link', 'Credit Link:') !!}
	{!! Form::text('credit_link', null, ['class' => 'form-control']) !!}
</div>

<!-- Credit Link Mm Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('credit_link_mm', 'Credit Link Mm:') !!}
	{!! Form::text('credit_link_mm', null, ['class' => 'form-control']) !!}
</div>

<!-- Credit Logo Url Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('credit_logo_url', 'Credit Logo Url:') !!}
	{!! Form::text('credit_logo_url', null, ['class' => 'form-control']) !!}
</div>

<!-- Credit Name Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('credit_name', 'Credit Name:') !!}
	{!! Form::text('credit_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('image', 'Image:') !!}
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

<!-- Likes Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('likes', 'Likes:') !!}
	{!! Form::number('likes', null, ['class' => 'form-control']) !!}
</div>

<!-- Postuploadname Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('postUploadName', 'Postuploadname:') !!}
	{!! Form::text('postUploadName', null, ['class' => 'form-control']) !!}
</div>

<!-- Postuploadpersonimg Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('postUploadPersonImg', 'Postuploadpersonimg:') !!}
	<!-- {!! Form::file('postUploadPersonImg') !!} -->
	<div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
        <div>
            <span class="btn btn-info btn-file">
                <span class="fileinput-new">Select image</span>
                <span class="fileinput-exists">Change</span>
                <input type="file" name="postUploadPersonImg">
            </span>
            <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
        </div>
    </div>
</div>

<!-- Postuploaduserimgpath Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('postUploadUserImgPath', 'Postuploaduserimgpath:') !!}
    <div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
        <div>
            <span class="btn btn-info btn-file">
                <span class="fileinput-new">Select image</span>
                <span class="fileinput-exists">Change</span>
                <input type="file" name="postUploadUserImgPath">
            </span>
            <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
        </div>
    </div>
</div>

<!-- Postuploadeddate Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('postUploadedDate', 'Postuploadeddate:') !!}
	<!-- {!! Form::date('postUploadedDate', null, ['class' => 'form-control']) !!} -->
	<div class="input-group form-group">
        <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
            <div class="dtp-container fg-line">
            <input type='text' name="postUploadedDate" class="form-control date-picker" placeholder="dd/mm/yyyy">
        </div>
    </div>
</div>

<!-- Post Author Role Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('post_author_role', 'Post Author Role:') !!}
	{!! Form::text('post_author_role', null, ['class' => 'form-control']) !!}
</div>

<!-- Post Author Role Mm Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('post_author_role_mm', 'Post Author Role Mm:') !!}
	{!! Form::text('post_author_role_mm', null, ['class' => 'form-control']) !!}
</div>

<!-- Share Count Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('share_count', 'Share Count:') !!}
	{!! Form::number('share_count', null, ['class' => 'form-control']) !!}
</div>

<!-- Suggest Section Eng Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('suggest_section_eng', 'Suggest Section Eng:') !!}
	{!! Form::text('suggest_section_eng', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('title', 'Title:') !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Titlemm Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('titleMm', 'Titlemm:') !!}
	{!! Form::text('titleMm', null, ['class' => 'form-control']) !!}
</div>

<!-- Userid Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('userId', 'Userid:') !!}
	{!! Form::text('userId', null, ['class' => 'form-control']) !!}
</div>

<!-- Videoid Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('videoId', 'Videoid:') !!}
	{!! Form::text('videoId', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
