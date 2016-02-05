@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($resources, ['route' => ['resources.update', $resources->id], 'method' => 'patch']) !!}

        @include('resources.fields')

    {!! Form::close() !!}
</div>
@endsection
