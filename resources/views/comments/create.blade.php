@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'comments.store']) !!}

        @include('comments.fields')

    {!! Form::close() !!}
</div>
@endsection
