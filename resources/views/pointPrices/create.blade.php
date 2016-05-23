@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'pointPrices.store']) !!}

        @include('pointPrices.fields')

    {!! Form::close() !!}
</div>
@endsection
