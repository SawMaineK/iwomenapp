@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($mutipleQuestion, ['route' => ['mutipleQuestions.update', $mutipleQuestion->id], 'method' => 'patch']) !!}

        @include('mutipleQuestions.fields')

    {!! Form::close() !!}
</div>
@endsection
