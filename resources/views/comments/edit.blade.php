@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'patch']) !!}

        @include('comments.fields')

    {!! Form::close() !!}
</div>
@endsection
