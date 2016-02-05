@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Authors</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('authors.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($authors->isEmpty())
                <div class="well text-center">No Authors found.</div>
            @else
                @include('authors.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $authors])


    </div>
@endsection
