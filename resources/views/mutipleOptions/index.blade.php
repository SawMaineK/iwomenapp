@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">MutipleOptions</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('mutipleOptions.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($mutipleOptions->isEmpty())
                <div class="well text-center">No MutipleOptions found.</div>
            @else
                @include('mutipleOptions.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $mutipleOptions])


    </div>
@endsection
