@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'apks.store','enctype'=>'multipart/form-data']) !!}

        @include('apks.fields')

    {!! Form::close() !!}
</div>
@endsection
