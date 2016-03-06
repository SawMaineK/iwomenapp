@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">PostLikes</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('postLikes.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($postLikes->isEmpty())
                <div class="well text-center">No PostLikes found.</div>
            @else
                @include('postLikes.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $postLikes])


    </div>
@endsection
