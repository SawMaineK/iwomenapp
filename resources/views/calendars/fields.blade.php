<!-- Objectid Field -->
<div class="form-group col-sm-6 col-lg-4">
    <div class="fg-line">
        {!! Form::label('objectId', 'Objectid:') !!}
    	{!! Form::text('objectId', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Title Field -->
<div class="form-group col-sm-6 col-lg-4">
    <div class="fg-line">
        {!! Form::label('title', 'Title:') !!}
    	{!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Title Mm Field -->
<div class="form-group col-sm-6 col-lg-4">
    <div class="fg-line">
        {!! Form::label('title_mm', 'Title Mm:') !!}
    	{!! Form::text('title_mm', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Description Field -->
<div class="form-group col-sm-6 col-lg-4">
    <div class="fg-line">
        {!! Form::label('description', 'Description:') !!}
    	{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Description Mm Field -->
<div class="form-group col-sm-6 col-lg-4">
    <div class="fg-line">
        {!! Form::label('description_mm', 'Description Mm:') !!}
    	{!! Form::textarea('description_mm', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Location Field -->
<div class="form-group col-sm-6 col-lg-4">
    <div class="fg-line">
        {!! Form::label('location', 'Location:') !!}
    	{!! Form::text('location', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- Start Date Field -->
<div class="form-group col-sm-6 col-lg-4">
    <div class="fg-line">
        {!! Form::label('start_date', 'Start Date:') !!}
    	<!-- {!! Form::date('start_date', null, ['class' => 'form-control']) !!} -->
        <div class="input-group form-group">
            <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                <div class="dtp-container fg-line">
                <input type='text' name="start_date" class="form-control date-picker" placeholder="dd/mm/yyyy">
            </div>
        </div>
    </div>
</div>

<!-- End Date Field -->
<div class="form-group col-sm-6 col-lg-4">
    <div class="fg-line">
        {!! Form::label('end_date', 'End Date:') !!}
    	<!-- {!! Form::date('end_date', null, ['class' => 'form-control']) !!} -->
        <div class="input-group form-group">
            <span class="input-group-addon"><i class="zmdi zmdi-calendar"></i></span>
                <div class="dtp-container fg-line">
                <input type='text' name="end_date" class="form-control date-picker" placeholder="dd/mm/yyyy">
            </div>
        </div>
    </div>
</div>

<!-- Start Time Field -->
<div class="form-group col-sm-6 col-lg-4">
    <div class="fg-line">
        {!! Form::label('start_time', 'Start Time:') !!}
    	{!! Form::text('start_time', null, ['class' => 'form-control']) !!}
    </div>
</div>

<!-- End Time Field -->
<div class="form-group col-sm-6 col-lg-4">
    <div class="fg-line">
        {!! Form::label('end_time', 'End Time:') !!}
    	{!! Form::text('end_time', null, ['class' => 'form-control']) !!}
    </div>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
