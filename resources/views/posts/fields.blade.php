<!-- Objectid Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('objectId', 'Objectid:') !!}
	{!! Form::text('objectId', null, ['class' => 'form-control']) !!}
</div>

<!-- Content Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('content', 'Content:') !!}
	{!! Form::textarea('content', null, ['class' => 'form-control']) !!}
</div>

<!-- Contenttype Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('contentType', 'Contenttype:') !!}
	{!! Form::text('contentType', null, ['class' => 'form-control']) !!}
</div>

<!-- Content Mm Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('content_mm', 'Content Mm:') !!}
	{!! Form::textarea('content_mm', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('image', 'Image:') !!}
	{!! Form::file('image') !!}
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
	{!! Form::file('postUploadPersonImg') !!}
</div>

<!-- Postuploadeddate Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('postUploadedDate', 'Postuploadeddate:') !!}
	{!! Form::date('postUploadedDate', null, ['class' => 'form-control']) !!}
</div>

<!-- Suggest Section Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('suggest_section', 'Suggest Section:') !!}
	{!! Form::text('suggest_section', null, ['class' => 'form-control']) !!}
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

<!-- Userrelation Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('userRelation', 'Userrelation:') !!}
	{!! Form::text('userRelation', null, ['class' => 'form-control']) !!}
</div>

<!-- Videoid Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('videoId', 'Videoid:') !!}
	{!! Form::text('videoId', null, ['class' => 'form-control']) !!}
</div>

<!-- Audiofile Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('audioFile', 'Audiofile:') !!}
	{!! Form::file('audioFile') !!}
</div>

<!-- Comment Count Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('comment_count', 'Comment Count:') !!}
	{!! Form::number('comment_count', null, ['class' => 'form-control']) !!}
</div>

<!-- Isallow Field -->
<div class="form-group col-sm-6 col-lg-4">
    <div class="checkbox">
		<label>{!! Form::checkbox('isAllow', 1, true) !!}Isallow</label>
	</div>
</div>

<!-- Postuploaduserimgpath Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('postUploadUserImgPath', 'Postuploaduserimgpath:') !!}
	{!! Form::text('postUploadUserImgPath', null, ['class' => 'form-control']) !!}
</div>

<!-- Share Count Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('share_count', 'Share Count:') !!}
	{!! Form::number('share_count', null, ['class' => 'form-control']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('category_id', 'Category Id:') !!}
	{!! Form::select('category_id', [ 'Calendar' => 'Calendar', 'Livelihood' => 'Livelihood', 'Q & A' => 'Q & A', ' Activities' => ' Activities', ' Poem' => ' Poem' ], null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
