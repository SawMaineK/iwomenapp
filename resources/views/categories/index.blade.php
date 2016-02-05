@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Categories</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('categories.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($categories->isEmpty())
                <div class="well text-center">No Categories found.</div>
            @else
                @include('categories.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $categories])


    </div>
@endsection
