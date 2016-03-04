<!-- Question Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('question_id', 'Question Id:') !!}
	{!! Form::select('question_id', $questions, null, ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('type', 'Type:') !!}
	{!! Form::select('type', [ 'text' => 'text', 'checkbox' => 'checkbox', 'radio' => 'radio', 'image' => 'image', 'upload_photo' => 'upload_photo','upload_audio' => 'upload_audio' ], null, ['class' => 'form-control']) !!}
</div>

<!-- Question Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('question', 'Question:') !!}
	{!! Form::text('question', null, ['class' => 'form-control']) !!}
</div>

<!-- Question Mm Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('question_mm', 'Question Mm:') !!}
	{!! Form::text('question_mm', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
