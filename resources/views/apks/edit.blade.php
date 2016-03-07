@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($apk, ['route' => ['apks.update', $apk->id], 'method' => 'patch']) !!}

        @include('apks.fields')

    {!! Form::close() !!}
</div>
@endsection
