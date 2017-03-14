@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($iWomenPostAudio, ['route' => ['iWomenPostAudios.update', $iWomenPostAudio->id], 'method' => 'patch']) !!}

        @include('iWomenPostAudios.fields')

    {!! Form::close() !!}
</div>
@endsection
