@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">PointPrices</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('pointPrices.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($pointPrices->isEmpty())
                <div class="well text-center">No PointPrices found.</div>
            @else
                @include('pointPrices.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $pointPrices])


    </div>
@endsection
