@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'mutipleQuestions.store']) !!}

        @include('mutipleQuestions.fields')

    {!! Form::close() !!}
</div>
@endsection
