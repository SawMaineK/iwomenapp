<!-- Mutiple Question Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('mutiple_question_id', 'Mutiple Question Id:') !!}
	{!! Form::select('mutiple_question_id', $mutipleQuestions, null, ['class' => 'form-control']) !!}
</div>

<!-- Option Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('option', 'Option:') !!}
	{!! Form::text('option', null, ['class' => 'form-control']) !!}
</div>

<!-- Option Mm Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('option_mm', 'Option Mm:') !!}
	{!! Form::text('option_mm', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
