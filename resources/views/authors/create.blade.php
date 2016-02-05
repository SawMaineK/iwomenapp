@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'authors.store']) !!}

        @include('authors.fields')

    {!! Form::close() !!}
</div>
@endsection
