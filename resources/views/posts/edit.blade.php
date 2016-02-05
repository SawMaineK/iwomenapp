@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'patch']) !!}

        @include('posts.fields')

    {!! Form::close() !!}
</div>
@endsection
