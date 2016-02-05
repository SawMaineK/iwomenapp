@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'sisterDownloadApps.store']) !!}

        @include('sisterDownloadApps.fields')

    {!! Form::close() !!}
</div>
@endsection
