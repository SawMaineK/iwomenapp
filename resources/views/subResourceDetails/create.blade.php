@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'subResourceDetails.store']) !!}

        @include('subResourceDetails.fields')

    {!! Form::close() !!}
</div>
@endsection
