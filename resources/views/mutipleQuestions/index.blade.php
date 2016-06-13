@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">MultipleQuestions</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('mutipleQuestions.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($mutipleQuestions->isEmpty())
                <div class="well text-center">No MultipleQuestions found.</div>
            @else
                @include('mutipleQuestions.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $mutipleQuestions])


    </div>
@endsection
