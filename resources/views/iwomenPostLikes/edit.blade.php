@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($iwomenPostLike, ['route' => ['iwomenPostLikes.update', $iwomenPostLike->id], 'method' => 'patch']) !!}

        @include('iwomenPostLikes.fields')

    {!! Form::close() !!}
</div>
@endsection
