@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'stickerStores.store']) !!}

        @include('stickerStores.fields')

    {!! Form::close() !!}
</div>
@endsection
