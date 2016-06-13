@extends('layouts.app')

@section('styles')
    <link href="{{Request::root()}}/vendors/bootgrid/jquery.bootgrid.min.css" rel="stylesheet">
    <style type="text/css">
        .bootgrid-footer .pagination, .bootgrid-footer{display: none}
        .card .row .row{margin: 4px !important;}
        .scrollbox {
            width: 100%;
            min-width: 250px;
            max-height: 120px;
            overflow: auto;
            overflow-x: hidden;
            border: 1px solid #f2f2f2;
            box-shadow: 0 0 2px 2px rgba(0,0,0,.1);
        }
        .scrollbox-inner{color: #666;
                font-family: 'Zawgyi-One', sans-serif;
                font-size: 13px;
                padding: 7px 9px;
                margin: 0;}
    </style>
@endsection

@section('content')

    <div class="card">
        <div class="card-header ch-alt">
            <a class="btn btn-primary pull-right" href="{!! route('calendars.create') !!}">Add New</a>
            <h2>Calendars <small></small></h2>
            @include('flash::message')
        </div>

        <div class="row">
            <div class="col-md-12 col-xs-12"> 
                @if($calendars->isEmpty())
                    <div class="well text-center">No Calendars found.</div>
                @else
                    @include('calendars.table')
                @endif
            </div>
        </div>
       
        <div class="row">  
            <div class="col-sm-12">  
                @include('common.paginate', ['records' => $calendars])
            </div>  
        </div>
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
                        
                        "commands": function(column, row) {
                            return "<a href='calendars/"+row.id+"/edit'><button type=\"button\" class=\"btn btn-icon command-edit\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-edit\"></span></button></a> " + 
                                "<a href='calendars/"+row.id+"/delete'><button type=\"button\" class=\"btn btn-icon command-delete\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-delete\"></span></button></a>";
                        }
                    }
                });
            });
    </script>
@endsection