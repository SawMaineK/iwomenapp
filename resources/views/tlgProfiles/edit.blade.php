@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($tlgProfile, ['route' => ['tlgProfiles.update', $tlgProfile->id], 'method' => 'patch']) !!}

        @include('tlgProfiles.fields')

    {!! Form::close() !!}
</div>
@endsection
