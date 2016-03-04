@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'avators.store']) !!}

        @include('avators.fields')

    {!! Form::close() !!}
</div>
@endsection
