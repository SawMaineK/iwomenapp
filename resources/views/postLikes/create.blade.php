@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'postLikes.store']) !!}

        @include('postLikes.fields')

    {!! Form::close() !!}
</div>
@endsection
