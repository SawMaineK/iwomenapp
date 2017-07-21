@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'subResourceDetailAudios.store']) !!}

        @include('subResourceDetailAudios.fields')

    {!! Form::close() !!}
</div>
@endsection
