@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'gcms.store']) !!}

        @include('gcms.fields')

    {!! Form::close() !!}
</div>
@endsection
