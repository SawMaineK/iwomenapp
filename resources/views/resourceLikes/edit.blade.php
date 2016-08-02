@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($resourceLike, ['route' => ['resourceLikes.update', $resourceLike->id], 'method' => 'patch']) !!}

        @include('resourceLikes.fields')

    {!! Form::close() !!}
</div>
@endsection
