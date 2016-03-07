@extends('layouts.app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Emails</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('emails.create') !!}">Add New</a>
        </div>

        <div class="row">
            @if($emails->isEmpty())
                <div class="well text-center">No Emails found.</div>
            @else
                @include('emails.table')
            @endif
        </div>

        @include('common.paginate', ['records' => $emails])


    </div>
@endsection
