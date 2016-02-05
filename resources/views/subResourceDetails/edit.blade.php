@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($subResourceDetail, ['route' => ['subResourceDetails.update', $subResourceDetail->id], 'method' => 'patch']) !!}

        @include('subResourceDetails.fields')

    {!! Form::close() !!}
</div>
@endsection
