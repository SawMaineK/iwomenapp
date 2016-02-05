@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'tlgProfiles.store']) !!}

        @include('tlgProfiles.fields')

    {!! Form::close() !!}
</div>
@endsection
