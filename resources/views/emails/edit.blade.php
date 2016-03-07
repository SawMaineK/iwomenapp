@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($email, ['route' => ['emails.update', $email->id], 'method' => 'patch']) !!}

        @include('emails.fields')

    {!! Form::close() !!}
</div>
@endsection
