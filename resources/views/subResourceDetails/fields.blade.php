<!-- Authorname Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('authorName', 'Authorname:') !!}
	{!! Form::text('authorName', null, ['class' => 'form-control']) !!}
</div>

<!-- Author Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('author_id', 'Author Id:') !!}
	{!! Form::text('author_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Author Img Url Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('author_img_url', 'Author Img Url:') !!}
	{!! Form::text('author_img_url', null, ['class' => 'form-control']) !!}
</div>

<!-- Isallow Field -->
<!-- <div class="form-group col-sm-6 col-lg-4">
    <div class="checkbox">
		<label>{!! Form::checkbox('isAllow', 1, true) !!}Isallow</label>
	</div>
</div> -->
<div class="form-group col-sm-4 col-lg-4">
	<div class="fg-line"> 
    	<div class="checkbox">
            <label>
                {!! Form::checkbox('isAllow', 1, true) !!}
                <i class="input-helper"></i>
                Isallow
            </label>
        </div>

    	
	</div>
</div>

<!-- Objectid Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('objectId', 'Objectid:') !!}
	{!! Form::text('objectId', null, ['class' => 'form-control']) !!}
</div>

<!-- Posted Date Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('posted_date', 'Posted Date:') !!}
	{!! Form::date('posted_date', null, ['class' => 'form-control']) !!}
</div>

<!-- Resource Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('resource_id', 'Resource Id:') !!}
	{!! Form::text('resource_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Sub Res Icon Img Url Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('sub_res_icon_img_url', 'Sub Res Icon Img Url:') !!}
	{!! Form::file('sub_res_icon_img_url') !!}
</div>

<!-- Sub Resouce Content Eng Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('sub_resouce_content_eng', 'Sub Resouce Content Eng:') !!}
	{!! Form::text('sub_resouce_content_eng', null, ['class' => 'form-control']) !!}
</div>

<!-- Sub Resouce Content Mm Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('sub_resouce_content_mm', 'Sub Resouce Content Mm:') !!}
	{!! Form::text('sub_resouce_content_mm', null, ['class' => 'form-control']) !!}
</div>

<!-- Sub Resource Title Eng Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('sub_resource_title_eng', 'Sub Resource Title Eng:') !!}
	{!! Form::text('sub_resource_title_eng', null, ['class' => 'form-control']) !!}
</div>

<!-- Sub Resource Title Mm Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('sub_resource_title_mm', 'Sub Resource Title Mm:') !!}
	{!! Form::text('sub_resource_title_mm', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
