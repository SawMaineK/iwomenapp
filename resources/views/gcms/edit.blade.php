@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($gcm, ['route' => ['gcms.update', $gcm->id], 'method' => 'patch']) !!}

        @include('gcms.fields')

    {!! Form::close() !!}
</div>
@endsection
