@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'subResourceDetailLikes.store']) !!}

        @include('subResourceDetailLikes.fields')

    {!! Form::close() !!}
</div>
@endsection
