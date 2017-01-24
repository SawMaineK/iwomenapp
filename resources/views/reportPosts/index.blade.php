@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">reportPosts</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('reportPosts.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($reportPosts->isEmpty())
                <div class="well text-center">No reportPosts found.</div>
            @else
                @include('reportPosts.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $reportPosts])


    </div>
@endsection
