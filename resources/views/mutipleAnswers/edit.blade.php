@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($mutipleAnswer, ['route' => ['mutipleAnswers.update', $mutipleAnswer->id], 'method' => 'patch']) !!}

        @include('mutipleAnswers.fields')

    {!! Form::close() !!}
</div>
@endsection
