@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">MutipleAnswers</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('mutipleAnswers.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($mutipleAnswers->isEmpty())
                <div class="well text-center">No MutipleAnswers found.</div>
            @else
                @include('mutipleAnswers.table')
            @endif
        </div>

    </div>
@endsection
