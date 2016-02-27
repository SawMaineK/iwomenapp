@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Gcms</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('gcms.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($gcms->isEmpty())
                <div class="well text-center">No Gcms found.</div>
            @else
                @include('gcms.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $gcms])


    </div>
@endsection
