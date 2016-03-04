@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Avators</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('avators.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($avators->isEmpty())
                <div class="well text-center">No Avators found.</div>
            @else
                @include('avators.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $avators])


    </div>
@endsection
