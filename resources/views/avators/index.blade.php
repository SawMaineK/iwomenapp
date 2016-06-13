@extends('layouts.app')

@section('styles')
    <link href="{{Request::root()}}/vendors/bootgrid/jquery.bootgrid.min.css" rel="stylesheet">
@endsection

@section('content')

    <div class="card">
        <div class="card-header ch-alt">
            <a class="btn btn-primary pull-right" href="{!! route('avators.create') !!}">Add New</a>
            <h2>Avators <small></small></h2>
            @include('flash::message')
        </div>

        <div class="row">
            <div class="col-md-12 col-xs-12"> 
                @if($avators->isEmpty())
                    <div class="well text-center">No avators found.</div>
                @else
                    @include('avators.table')
                @endif
            </div>
        </div>
       
        <div class="row">  
            <div class="col-sm-12">  
                @include('common.paginate', ['records' => $avators])
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
                            return "<a href='avators/"+row.id+"/edit'><button type=\"button\" class=\"btn btn-icon command-edit\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-edit\"></span></button> </a> " + 
                                "<a href='avators/"+row.id+"/delete'><button type=\"button\" class=\"btn btn-icon command-delete\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-delete\"></span></button></a>";
                        }
                    }
                });
            });
        </script>
@endsection
