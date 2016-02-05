@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">SisterDownloadApps</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('sisterDownloadApps.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($sisterDownloadApps->isEmpty())
                <div class="well text-center">No SisterDownloadApps found.</div>
            @else
                @include('sisterDownloadApps.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $sisterDownloadApps])


    </div>
@endsection
