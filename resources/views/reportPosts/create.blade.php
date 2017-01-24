@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'reportPosts.store']) !!}

        @include('reportPosts.fields')

    {!! Form::close() !!}
</div>
@endsection
