@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'shareUsers.store']) !!}

        @include('shareUsers.fields')

    {!! Form::close() !!}
</div>
@endsection
