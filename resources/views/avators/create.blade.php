@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'avators.store','enctype'=>'multipart/form-data']) !!}

        @include('avators.fields')

    {!! Form::close() !!}
</div>
@endsection
