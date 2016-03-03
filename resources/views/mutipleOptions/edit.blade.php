@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($mutipleOption, ['route' => ['mutipleOptions.update', $mutipleOption->id], 'method' => 'patch']) !!}

        @include('mutipleOptions.fields')

    {!! Form::close() !!}
</div>
@endsection
