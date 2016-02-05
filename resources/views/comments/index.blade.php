@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Comments</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('comments.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($comments->isEmpty())
                <div class="well text-center">No Comments found.</div>
            @else
                @include('comments.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $comments])


    </div>
@endsection
