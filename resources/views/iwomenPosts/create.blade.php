@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'iwomenPosts.store']) !!}

        @include('iwomenPosts.fields')

    {!! Form::close() !!}
</div>
@endsection
