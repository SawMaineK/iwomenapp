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

    <div class="card">
        <div class="card-header ch-alt">
            <a class="btn btn-primary pull-right" href="{!! route('mutipleAnswers.create') !!}">Add New</a>
            <h2>MultipleAnswers <small></small></h2>
            @include('flash::message')
        </div>

        <div class="row">
            <div class="col-md-12 col-xs-12"> 
                @if($mutipleAnswers->isEmpty())
                    <div class="well text-center">No mutipleAnswers found.</div>
                @else
                    @include('mutipleAnswers.table')
                @endif
            </div>
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

                $("#data-table-command").bootgrid({
                    css: {
                        icon: 'zmdi icon',
                        iconColumns: 'zmdi-view-module',
                        iconDown: 'zmdi-expand-more',
                        iconRefresh: 'zmdi-refresh',
                        iconUp: 'zmdi-expand-less'
                    },
                    formatters: {
                        "correctanswer": function(column, row) {
                            if(row.correctornot!="0"){
                                return "<a href='/admin/competition-answers-uncorrect/"+row.id+"'><button type=\"button\" class=\"btn btn-icon command-edit\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-close\"></span></button> </a>";
                            }else{
                                return "<a href='/admin/competition-answers-correct/"+row.id+"'><button type=\"button\" class=\"btn btn-icon command-edit\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-check\"></span></button> </a>";
                                
                            }

                            /*if(row.id != 0){
                                 return '<a href="admin/competition-answers-uncorrect/'+row.correctanswer+'"><button type="button" class="btn btn-icon command-edit" data-row-id=""><span class="zmdi zmdi-close"></span></button> </a>';
                            }else{
                                return '<a href="admin/competition-answers-correct/'+row.correctanswer+'"><button type="button" class="btn btn-icon command-edit" data-row-id=""><span class="zmdi zmdi-check"></span></button> </a>';
                            }*/
                           
                        }
                    }
                });
                
            });
        </script>
@endsection
