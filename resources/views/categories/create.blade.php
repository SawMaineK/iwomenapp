@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'categories.store']) !!}

        @include('categories.fields')

    {!! Form::close() !!}
</div>
@endsection
