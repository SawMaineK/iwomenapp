@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">SubResourceDetailLikes</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('subResourceDetailLikes.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($subResourceDetailLikes->isEmpty())
                <div class="well text-center">No SubResourceDetailLikes found.</div>
            @else
                @include('subResourceDetailLikes.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $subResourceDetailLikes])


    </div>
@endsection
