@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'mutipleAnswers.store']) !!}

        @include('mutipleAnswers.fields')

    {!! Form::close() !!}
</div>
@endsection
