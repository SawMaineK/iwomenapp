@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($shareUser, ['route' => ['shareUsers.update', $shareUser->id], 'method' => 'patch']) !!}

        @include('shareUsers.fields')

    {!! Form::close() !!}
</div>
@endsection
