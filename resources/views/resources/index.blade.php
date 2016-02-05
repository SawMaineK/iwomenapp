@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Resources</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('resources.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($resources->isEmpty())
                <div class="well text-center">No Resources found.</div>
            @else
                @include('resources.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $resources])


    </div>
@endsection
