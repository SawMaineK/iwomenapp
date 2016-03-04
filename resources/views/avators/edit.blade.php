@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($avator, ['route' => ['avators.update', $avator->id], 'method' => 'patch']) !!}

        @include('avators.fields')

    {!! Form::close() !!}
</div>
@endsection
