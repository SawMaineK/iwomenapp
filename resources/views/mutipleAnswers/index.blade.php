@extends('layouts.app')
@section('styles')
    <link href="{{Request::root()}}/vendors/bootgrid/jquery.bootgrid.min.css" rel="stylesheet">
    <style type="text/css">
        .red-color{color:#4285F4;}
        table tr td{font-family: 'roboto','Zawgyi-One' !important;}
        table tr td b{font-family: 'roboto','Zawgyi-One' !important;}
    </style>
@endsection

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">MultipleAnswers</h1>
            <!-- <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('mutipleAnswers.create') !!}">Add New</a> -->
            <a href="#" id='btnExportExcel'><button type="submit" class="btn btn-primary btn-sm waves-effect pull-right">Export To Excel</button></a>
        </div>

        <div class="row">
            @if($mutipleAnswers->isEmpty())
                <div class="well text-center">No MultipleAnswers found.</div>
            @else
                @include('mutipleAnswers.table')
            @endif
        </div>

    </div>
@endsection
@section('scripts')
    <script src="{{Request::root()}}/vendors/bootgrid/jquery.bootgrid.min.js"></script>
    <script type="text/javascript" src="{{Request::root()}}/js/jquery.battatech.excelexport.min.js"></script>
    <script type="text/javascript">
            $(document).ready(function(){

                var exporttoexcel=function(btnExportExcel, filename, tblExportID){
                      $(btnExportExcel).click(function () {
                         var uri =$('#'+tblExportID).btechco_excelexport({
                                containerid: tblExportID
                               , datatype: $datatype.Table
                               , returnUri: true
                            });
                         $(this).attr('download', filename+'.xls').attr('href', uri).attr('target', '_blank');
                      });
                }
                var filename=$('#filename').html();
                exporttoexcel('#btnExportExcel', filename, 'data-table-selection');
                
            });
        </script>
@endsection
