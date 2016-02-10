<!-- Objectid Field -->
		<div class="form-group col-sm-4 col-lg-4">
			<div class="fg-line"> 
		    	{!! Form::label('objectId', 'Objectid:') !!}
				{!! Form::text('objectId', null, ['class' => 'form-control']) !!}
			</div>
		</div>

		<!-- Contenttype Field -->
		<div class="form-group col-sm-4 col-lg-4">
			<div class="fg-line"> 
		    	{!! Form::label('contentType', 'Contenttype:') !!}
				{!! Form::text('contentType', null, ['class' => 'form-control']) !!}
			</div>
		</div>

		<!-- Postuploadname Field -->
		<div class="form-group col-sm-4 col-lg-4">
			<div class="fg-line"> 
		    	{!! Form::label('postUploadName', 'Postuploadname:') !!}
				{!! Form::text('postUploadName', null, ['class' => 'form-control']) !!}
			</div>
		</div>


		<!-- Content Mm Field -->
		<div class="form-group col-sm-4 col-lg-4">
			<div class="fg-line"> 
		    	{!! Form::label('content_mm', 'Content Mm:') !!}
				{!! Form::textarea('content_mm', null, ['class' => 'form-control', 'rows'=>9]) !!}
			</div>
		</div>

		<!-- Content Field -->
		<div class="form-group col-sm-4 col-lg-4">
			<div class="fg-line"> 
		    	{!! Form::label('', 'Content:') !!}
				{!! Form::textarea('content', null, ['class' => 'form-control', 'rows'=>9]) !!}
			</div>
		</div>

		
		<!-- Image Field -->
		<div class="form-group col-sm-4 col-lg-4">
			<div class="fg-line"> 
		    	<!-- {!! Form::label('', 'Image:') !!} -->
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
				<!-- {!! Form::file('image') !!} -->
			</div>
		</div>

			
		
		<!-- Postuploaduserimgpath Field -->
		<div class="form-group col-sm-4 col-lg-4">

			<div class="fg-line"> 
		    	{!! Form::label('postUploadUserImgPath', 'Postuploaduserimgpath:') !!}
				{!! Form::text('postUploadUserImgPath', null, ['class' => 'form-control']) !!}
			</div>
		</div>

		<!-- Postuploadpersonimg Field -->
		<div class="form-group col-sm-4 col-lg-4">
			<div class="fg-line"> 
		    	{!! Form::label('postUploadPersonImg', 'Postuploadpersonimg:') !!}
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

				<!-- {!! Form::file('postUploadPersonImg') !!} -->
			</div>
		</div>

		<!-- Audiofile Field -->
		<div class="form-group col-sm-4 col-lg-4">
			<div class="fg-line"> 
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
		</div>
		

		<!-- Likes Field -->
		<div class="form-group col-sm-4 col-lg-4">
			<div class="fg-line"> 
		    	{!! Form::label('likes', 'Likes:') !!}
				{!! Form::number('likes', null, ['class' => 'form-control']) !!}
			</div>
		</div>

		<!-- Postuploadeddate Field -->
		<div class="form-group col-sm-4 col-lg-4">
		    {!! Form::label('postUploadedDate', 'Postuploadeddate:') !!}
			<!-- {!! Form::date('postUploadedDate', null, ['class' => 'form-control']) !!} -->
			<div class="input-group form-group">
                <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                    <div class="dtp-container fg-line">
                    <input type='text' name="postUploadedDate" class="form-control date-picker" placeholder="dd/mm/yyyy">
                </div>
            </div>
		</div>


		<!-- Suggest Section Field -->
		<div class="form-group col-sm-4 col-lg-4">
			<div class="fg-line"> 
		    	{!! Form::label('suggest_section', 'Suggest Section:') !!}
				{!! Form::text('suggest_section', null, ['class' => 'form-control']) !!}
			</div>
		</div>

		<!-- Suggest Section Eng Field -->
		<div class="form-group col-sm-4 col-lg-4">
			<div class="fg-line"> 
		    	{!! Form::label('suggest_section_eng', 'Suggest Section Eng:') !!}
				{!! Form::text('suggest_section_eng', null, ['class' => 'form-control']) !!}
			</div>
		</div>

		<!-- Title Field -->
		<div class="form-group col-sm-4 col-lg-4">
			<div class="fg-line"> 
		    	{!! Form::label('title', 'Title:') !!}
				{!! Form::text('title', null, ['class' => 'form-control']) !!}
			</div>
		</div>


		<!-- Titlemm Field -->
		<div class="form-group col-sm-4 col-lg-4">
			<div class="fg-line"> 
		    	{!! Form::label('titleMm', 'Titlemm:') !!}
				{!! Form::text('titleMm', null, ['class' => 'form-control']) !!}
			</div>
		</div>

		<!-- Userid Field -->
		<div class="form-group col-sm-4 col-lg-4">
			<div class="fg-line"> 
		    	{!! Form::label('userId', 'Userid:') !!}
				{!! Form::text('userId', null, ['class' => 'form-control']) !!}
			</div>
		</div>

		<!-- Userrelation Field -->
		<div class="form-group col-sm-4 col-lg-4">
			<div class="fg-line"> 
		    	{!! Form::label('userRelation', 'Userrelation:') !!}
				{!! Form::text('userRelation', null, ['class' => 'form-control']) !!}
			</div>
		</div>

<div class="row">
		<!-- Videoid Field -->
		<div class="form-group col-sm-4 col-lg-4">
			<div class="fg-line"> 
		    	{!! Form::label('videoId', 'Videoid:') !!}
				{!! Form::text('videoId', null, ['class' => 'form-control']) !!}
			</div>
		</div>

		

		<!-- Comment Count Field -->
		<div class="form-group col-sm-4 col-lg-4">
			<div class="fg-line"> 
		    	{!! Form::label('comment_count', 'Comment Count:') !!}
				{!! Form::number('comment_count', null, ['class' => 'form-control']) !!}
			</div>
		</div>


		<!-- Isallow Field -->
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
</div>



		<!-- Share Count Field -->
		<div class="form-group col-sm-4 col-lg-4">
			<div class="fg-line"> 
		    	{!! Form::label('share_count', 'Share Count:') !!}
				{!! Form::number('share_count', null, ['class' => 'form-control']) !!}
			</div>
		</div>

		<!-- Category Id Field -->
		<div class="form-group col-sm-4 col-lg-4">
			<div class="fg-line"> 
		    	{!! Form::label('category_id', 'Category Id:') !!}
				{!! Form::select('category_id', [ 'Calendar' => 'Calendar', 'Livelihood' => 'Livelihood', 'Q & A' => 'Q & A', ' Activities' => ' Activities', ' Poem' => ' Poem' ], null, ['class' => 'selectpicker', 'data-live-search'=>"true"]) !!}
			</div>
		</div>



		<!-- Submit Field -->
		<div class="form-group col-sm-12">
		    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
		</div>
