@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'iwomenPostLikes.store']) !!}

        @include('iwomenPostLikes.fields')

    {!! Form::close() !!}
</div>
@endsection
