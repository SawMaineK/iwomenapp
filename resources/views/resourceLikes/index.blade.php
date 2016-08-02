@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">ResourceLikes</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('resourceLikes.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($resourceLikes->isEmpty())
                <div class="well text-center">No ResourceLikes found.</div>
            @else
                @include('resourceLikes.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $resourceLikes])


    </div>
@endsection
