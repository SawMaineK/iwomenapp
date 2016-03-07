@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Apks</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('apks.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($apks->isEmpty())
                <div class="well text-center">No Apks found.</div>
            @else
                @include('apks.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $apks])


    </div>
@endsection
