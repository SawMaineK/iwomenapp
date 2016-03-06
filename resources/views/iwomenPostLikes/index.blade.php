@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">IwomenPostLikes</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('iwomenPostLikes.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($iwomenPostLikes->isEmpty())
                <div class="well text-center">No IwomenPostLikes found.</div>
            @else
                @include('iwomenPostLikes.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $iwomenPostLikes])


    </div>
@endsection
