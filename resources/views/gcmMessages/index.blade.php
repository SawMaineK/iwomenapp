@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">GcmMessages</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('gcmMessages.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($gcmMessages->isEmpty())
                <div class="well text-center">No GcmMessages found.</div>
            @else
                @include('gcmMessages.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $gcmMessages])


    </div>
@endsection
