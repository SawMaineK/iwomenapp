@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'mutipleOptions.store']) !!}

        @include('mutipleOptions.fields')

    {!! Form::close() !!}
</div>
@endsection
