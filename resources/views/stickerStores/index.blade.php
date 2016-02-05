@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">StickerStores</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('stickerStores.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($stickerStores->isEmpty())
                <div class="well text-center">No StickerStores found.</div>
            @else
                @include('stickerStores.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $stickerStores])


    </div>
@endsection
