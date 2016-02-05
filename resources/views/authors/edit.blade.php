@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($author, ['route' => ['authors.update', $author->id], 'method' => 'patch']) !!}

        @include('authors.fields')

    {!! Form::close() !!}
</div>
@endsection
