@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">IwomenPosts</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('iwomenPosts.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($iwomenPosts->isEmpty())
                <div class="well text-center">No IwomenPosts found.</div>
            @else
                @include('iwomenPosts.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $iwomenPosts])


    </div>
@endsection
