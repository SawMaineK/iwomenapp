@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'iWomenPostAudios.store']) !!}

        @include('iWomenPostAudios.fields')

    {!! Form::close() !!}
</div>
@endsection
