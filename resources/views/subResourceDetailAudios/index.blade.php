@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">SubResourceDetailAudios</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('subResourceDetailAudios.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($subResourceDetailAudios->isEmpty())
                <div class="well text-center">No SubResourceDetailAudios found.</div>
            @else
                @include('subResourceDetailAudios.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $subResourceDetailAudios])


    </div>
@endsection
