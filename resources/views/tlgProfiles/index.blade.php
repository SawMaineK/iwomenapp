@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">TlgProfiles</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('tlgProfiles.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($tlgProfiles->isEmpty())
                <div class="well text-center">No TlgProfiles found.</div>
            @else
                @include('tlgProfiles.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $tlgProfiles])


    </div>
@endsection
