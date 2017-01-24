@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($reportPost, ['route' => ['reportPosts.update', $reportPost->id], 'method' => 'patch']) !!}

        @include('reportPosts.fields')

    {!! Form::close() !!}
</div>
@endsection
