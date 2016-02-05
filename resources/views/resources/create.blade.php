@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'resources.store']) !!}

        @include('resources.fields')

    {!! Form::close() !!}
</div>
@endsection
