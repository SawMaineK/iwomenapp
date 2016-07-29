@extends('layouts.app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($subResourceDetailLike, ['route' => ['subResourceDetailLikes.update', $subResourceDetailLike->id], 'method' => 'patch']) !!}

        @include('subResourceDetailLikes.fields')

    {!! Form::close() !!}
</div>
@endsection
