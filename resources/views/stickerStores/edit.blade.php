@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($stickerStore, ['route' => ['stickerStores.update', $stickerStore->id], 'method' => 'patch']) !!}

        @include('stickerStores.fields')

    {!! Form::close() !!}
</div>
@endsection
