<!-- Objectid Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('objectId', 'Objectid:') !!}
	{!! Form::text('objectId', null, ['class' => 'form-control']) !!}
</div>

<!-- Username Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('username', 'Username:') !!}
	{!! Form::text('username', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('password', 'Password:') !!}
	{!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('email', 'Email:') !!}
	{!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Facebookid Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('facebookId', 'Facebookid:') !!}
	{!! Form::text('facebookId', null, ['class' => 'form-control']) !!}
</div>

<!-- Istlgtownshipexit Field -->
<div class="form-group col-sm-6 col-lg-4">
    <div class="checkbox">
		<label>{!! Form::checkbox('isTlgTownshipExit', 1, true) !!}Istlgtownshipexit</label>
	</div>
</div>

<!-- Istestacc Field -->
<div class="form-group col-sm-6 col-lg-4">
    <div class="checkbox">
		<label>{!! Form::checkbox('isTestAcc', 1, true) !!}Istestacc</label>
	</div>
</div>

<!-- Phoneno Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('phoneNo', 'Phoneno:') !!}
	{!! Form::text('phoneNo', null, ['class' => 'form-control']) !!}
</div>

<!-- Profileimage Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('profileimage', 'Profileimage:') !!}
	{!! Form::file('profileimage') !!}
</div>

<!-- Searchname Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('searchName', 'Searchname:') !!}
	{!! Form::text('searchName', null, ['class' => 'form-control']) !!}
</div>

<!-- Tlg City Address Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('tlg_city_address', 'Tlg City Address:') !!}
	{!! Form::text('tlg_city_address', null, ['class' => 'form-control']) !!}
</div>

<!-- User Profile Img Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('user_profile_img', 'User Profile Img:') !!}
	{!! Form::file('user_profile_img') !!}
</div>

<!-- Updatedat Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('updatedAt', 'Updatedat:') !!}
	{!! Form::date('updatedAt', null, ['class' => 'form-control']) !!}
</div>

<!-- Registerbodname Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('registerBODname', 'Registerbodname:') !!}
	{!! Form::text('registerBODname', null, ['class' => 'form-control']) !!}
</div>

<!-- Userimgpath Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('userImgPath', 'Userimgpath:') !!}
	{!! Form::text('userImgPath', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
