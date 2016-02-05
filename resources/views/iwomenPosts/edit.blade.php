@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($iwomenPost, ['route' => ['iwomenPosts.update', $iwomenPost->id], 'method' => 'patch']) !!}

        @include('iwomenPosts.fields')

    {!! Form::close() !!}
</div>
@endsection
