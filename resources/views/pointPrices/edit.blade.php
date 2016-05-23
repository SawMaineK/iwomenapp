@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($pointPrice, ['route' => ['pointPrices.update', $pointPrice->id], 'method' => 'patch']) !!}

        @include('pointPrices.fields')

    {!! Form::close() !!}
</div>
@endsection
