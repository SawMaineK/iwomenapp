<!-- Objectid Field -->
<div class="form-group col-sm-6 col-lg-4">
	<div class="fg-line">
    	{!! Form::label('objectId', 'Objectid:') !!}
		{!! Form::text('objectId', null, ['class' => 'form-control']) !!}
	</div>
</div>

<!-- Username Field -->
<div class="form-group col-sm-6 col-lg-4">
	<div class="fg-line">
    	{!! Form::label('username', 'Username:') !!}
		{!! Form::text('username', null, ['class' => 'form-control']) !!}
	</div>
</div>

<!-- Password Field -->
<div class="form-group col-sm-6 col-lg-4">
	<div class="fg-line">
    	{!! Form::label('password', 'Password:') !!}
		{!! Form::password('password', ['class' => 'form-control']) !!}
	</div>
</div>

<div class="row">
	<!-- Email Field -->
	<div class="form-group col-sm-6 col-lg-4">
		<div class="fg-line">
	    	{!! Form::label('email', 'Email:') !!}
			{!! Form::email('email', null, ['class' => 'form-control']) !!}
		</div>
	</div>

	<!-- Facebookid Field -->
	<div class="form-group col-sm-6 col-lg-4">
		<div class="fg-line">
	    	{!! Form::label('facebookId', 'Facebookid:') !!}
			{!! Form::text('facebookId', null, ['class' => 'form-control']) !!}
		</div>
	</div>

	<!-- Istlgtownshipexit Field -->
	<div class="form-group col-sm-6 col-lg-4">
		<div class="fg-line">
			<div class="checkbox">
		        <label>
		            {!! Form::checkbox('isTlgTownshipExit', 1, true) !!}Istlgtownshipexit
		            <i class="input-helper"></i>
		            Isallow
		        </label>
		    </div>
		</div>
	</div>
</div>

<!-- Istestacc Field -->
<div class="form-group col-sm-6 col-lg-4">
	<div class="fg-line">
		<div class="checkbox">
	        <label>
	            {!! Form::checkbox('isTestAcc', 1, true) !!} IsTestAcc
	            <i class="input-helper"></i>
	            Isallow
	        </label>
	    </div>
	</div>

</div>

<!-- Phoneno Field -->
<div class="form-group col-sm-6 col-lg-4">
	<div class="fg-line">
	    {!! Form::label('phoneNo', 'Phoneno:') !!}
		{!! Form::text('phoneNo', null, ['class' => 'form-control']) !!}
	</div>
</div>

<!-- Profileimage Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('profileimage', 'Profileimage:') !!}
	<!-- {!! Form::file('profileimage') !!} -->
	<div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
        <div>
            <span class="btn btn-info btn-file">
                <span class="fileinput-new">Select image</span>
                <span class="fileinput-exists">Change</span>
                <input type="file" name="profileimage">
            </span>
            <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
        </div>
    </div>
</div>

<!-- Searchname Field -->
<div class="form-group col-sm-6 col-lg-4">
	<div class="fg-line">
	    {!! Form::label('searchName', 'Searchname:') !!}
		{!! Form::text('searchName', null, ['class' => 'form-control']) !!}
	</div>
</div>

<!-- Tlg City Address Field -->
<div class="form-group col-sm-6 col-lg-4">
	<div class="fg-line">
	    {!! Form::label('tlg_city_address', 'Tlg City Address:') !!}
		{!! Form::text('tlg_city_address', null, ['class' => 'form-control']) !!}
	</div>
</div>

<!-- User Profile Img Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('user_profile_img', 'User Profile Img:') !!}
	<!-- {!! Form::file('user_profile_img') !!} -->
	<div class="fileinput fileinput-new" data-provides="fileinput">
        <div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
        <div>
            <span class="btn btn-info btn-file">
                <span class="fileinput-new">Select image</span>
                <span class="fileinput-exists">Change</span>
                <input type="file" name="user_profile_img">
            </span>
            <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
        </div>
    </div>
</div>

<!-- Updatedat Field -->
<div class="form-group col-sm-6 col-lg-4">
	<div class="fg-line">
	    {!! Form::label('updatedAt', 'Updatedat:') !!}
		<!-- {!! Form::date('updatedAt', null, ['class' => 'form-control']) !!} -->
		<div class="input-group form-group">
            <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                <div class="dtp-container fg-line">
                <input type='text' name="updatedAt" class="form-control date-picker" placeholder="dd/mm/yyyy">
            </div>
        </div>
	</div>
</div>

<!-- Registerbodname Field -->
<div class="form-group col-sm-6 col-lg-4">
	<div class="fg-line">
	    {!! Form::label('registerBODname', 'Registerbodname:') !!}
		{!! Form::text('registerBODname', null, ['class' => 'form-control']) !!}
	</div>
</div>

<!-- Userimgpath Field -->
<div class="form-group col-sm-6 col-lg-4">
	<div class="fg-line">
	    {!! Form::label('userImgPath', 'Userimgpath:') !!}
		{!! Form::text('userImgPath', null, ['class' => 'form-control']) !!}
	</div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
