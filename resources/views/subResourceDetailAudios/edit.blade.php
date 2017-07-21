@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($subResourceDetailAudio, ['route' => ['subResourceDetailAudios.update', $subResourceDetailAudio->id], 'method' => 'patch']) !!}

        @include('subResourceDetailAudios.fields')

    {!! Form::close() !!}
</div>
@endsection
