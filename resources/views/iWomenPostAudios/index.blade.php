@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">IWomenPostAudios</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('iWomenPostAudios.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($iWomenPostAudios->isEmpty())
                <div class="well text-center">No IWomenPostAudios found.</div>
            @else
                @include('iWomenPostAudios.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $iWomenPostAudios])


    </div>
@endsection
