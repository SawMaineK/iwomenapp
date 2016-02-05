@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($sisterDownloadApp, ['route' => ['sisterDownloadApps.update', $sisterDownloadApp->id], 'method' => 'patch']) !!}

        @include('sisterDownloadApps.fields')

    {!! Form::close() !!}
</div>
@endsection
