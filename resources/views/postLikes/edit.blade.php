@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($postLike, ['route' => ['postLikes.update', $postLike->id], 'method' => 'patch']) !!}

        @include('postLikes.fields')

    {!! Form::close() !!}
</div>
@endsection
