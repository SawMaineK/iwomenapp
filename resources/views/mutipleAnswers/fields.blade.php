<!-- Mutiple Question Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('mutiple_question_id', 'Mutiple Question Id:') !!}
	{!! Form::select('mutiple_question_id', [ 'Q1' => 'Q1', 'Q2' => 'Q2', 'Q3' => 'Q3' ], null, ['class' => 'form-control']) !!}
</div>

<!-- Answer Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('answer', 'Answer:') !!}
	{!! Form::text('answer', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('user_id', 'User Id:') !!}
	{!! Form::select('user_id', [ 'user1' => 'user1', 'user2' => 'user2', 'user3' => 'user3' ], null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
