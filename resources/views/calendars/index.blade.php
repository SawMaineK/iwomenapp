@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Calendars</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('calendars.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($calendars->isEmpty())
                <div class="well text-center">No Calendars found.</div>
            @else
                @include('calendars.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $calendars])


    </div>
@endsection
