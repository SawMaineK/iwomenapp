@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'emails.store']) !!}

        @include('emails.fields')

    {!! Form::close() !!}
</div>
@endsection
