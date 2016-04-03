@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">ShareUsers</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('shareUsers.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($shareUsers->isEmpty())
                <div class="well text-center">No ShareUsers found.</div>
            @else
                @include('shareUsers.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $shareUsers])


    </div>
@endsection
