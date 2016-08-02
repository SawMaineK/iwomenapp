@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'resourceLikes.store']) !!}

        @include('resourceLikes.fields')

    {!! Form::close() !!}
</div>
@endsection
