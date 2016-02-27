@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'gcmMessages.store', 'enctype'=>'multipart/form-data']) !!}

        @include('gcmMessages.fields')

    {!! Form::close() !!}
</div>
@endsection
