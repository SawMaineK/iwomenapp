@extends('layouts.app')

@section('styles')
    <link href="{{Request::root()}}/vendors/bootgrid/jquery.bootgrid.min.css" rel="stylesheet">
    <style type="text/css">
        .bootgrid-footer .pagination, .bootgrid-footer{display: none}
        .card .row .row{margin: 4px !important;}
    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header ch-alt">
            <a class="btn btn-primary pull-right" href="{!! route('tlgProfiles.create') !!}">Add New</a>
            <h2>TlgProfiles <small></small></h2>
            @include('flash::message')
        </div>

        @include('flash::message')
         <div class="row">
            <div class="col-md-12"> 
                @if($tlgProfiles->isEmpty())
                    <div class="well text-center">No TlgProfiles found.</div>
                @else
                    @include('tlgProfiles.table')
                @endif
            </div>
        </div>

        @include('common.paginate', ['records' => $tlgProfiles])


    </div>
@endsection

@section('scripts')
    <script src="{{Request::root()}}/vendors/bootgrid/jquery.bootgrid.min.js"></script>

    <script type="text/javascript">
            $(function(){
                //Command Buttons
                $("#data-table-command").bootgrid({
                    css: {
                        icon: 'zmdi icon',
                        iconColumns: 'zmdi-view-module',
                        iconDown: 'zmdi-expand-more',
                        iconRefresh: 'zmdi-refresh',
                        iconUp: 'zmdi-expand-less'
                    },
                    formatters: {
                        "image": function(column, row) {
                            // return '<img class="img-responsive" src="'+data-row-image+'">';
                            return '<img class="img-responsive" src="../../media/gallery/1.jpg">';
                        },
                        "postUploadPersonImg": function(column, row) {
                            // return '<img class="img-responsive" src="'+data-row-postUploadPersonImg+'">';
                            return '<img class="img-responsive" src="../../media/gallery/1.jpg">';
                        },
                        "commands": function(column, row) {
                            return "<a href='tlgProfiles/"+row.id+"/edit'><button type=\"button\" class=\"btn btn-icon command-edit\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-edit\"></span></button></a> " + 
                                "<a href='tlgProfiles/"+row.id+"/edit'><button type=\"button\" class=\"btn btn-icon command-delete\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-delete\"></span></button></a>";
                        }
                    }
                });
            });
        </script>
@endsection