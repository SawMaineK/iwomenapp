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
            <a class="btn btn-primary pull-right" href="{!! route('iwomenPosts.create') !!}">Add New</a>
            <h2>iWomen Posts <small></small></h2>
            @include('flash::message')
        </div>

        <div class="row">
            <div class="col-md-12 col-xs-12"> 
                @if($iwomenPosts->isEmpty())
                    <div class="well text-center">No iwomenPosts found.</div>
                @else
                    @include('iwomenPosts.table')
                @endif
            </div>
        </div>
       
        <div class="row">  
            <div class="col-sm-12">  
                @include('common.paginate', ['records' => $iwomenPosts])
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
                        "image": function(column, row) {
                            return '<img class="img-responsive" src="'+row.image+'">';
                            // return '<img class="img-responsive" src="../../media/gallery/1.jpg">';
                        },
                        "postUploadPersonImg": function(column, row) {
                            return '<img class="img-responsive" src="'+row.postUploadPersonImg+'">';
                            // return '<img class="img-responsive" src="../../media/gallery/1.jpg">';
                        },
                        "postUploadUserImgPath": function(column, row) {
                            return '<img class="img-responsive" src="'+row.postUploadUserImgPath+'">';
                            // return '<img class="img-responsive" src="../../media/gallery/1.jpg">';
                        },
                        
                        "commands": function(column, row) {
                            return "<a href='/iwomenPosts/"+row.id+"/edit'><button type=\"button\" class=\"btn btn-icon command-edit\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-edit\"></span></button> </a> " + 
                                "<a href='/iwomenPosts/"+row.id+"/delete'><button type=\"button\" class=\"btn btn-icon command-delete\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-delete\"></span></button></a>";
                        }
                    }
                });
            });
        </script>
@endsection