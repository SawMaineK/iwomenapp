@extends('layouts.app')

@section('title', 'Competition Question List')

@section('styles')
    <link href="{{Request::root()}}/vendors/bootgrid/jquery.bootgrid.min.css" rel="stylesheet">
    <style type="text/css">
        .bootgrid-footer .pagination, .bootgrid-footer{display: none}
        .card .row .row{margin: 4px !important;}
        #scrollbox{ width:100%;min-width: 200px; height:60px;  overflow:auto; overflow-x:hidden; border:1px solid #f2f2f2;  box-shadow: 0 0 2px 2px #ddd;}
        #scrollbox > p{color:#666; font-family:'Zawgyi-One', sans-serif; font-size:13px; padding:7px 9px; margin:0; }
    </style>
@endsection
@section('content')
    <section id="content">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h3>Competition Question List <small></small></h3>
                        <a href="/admin/competition-question/create"><button type="submit" class="btn btn-primary btn-sm waves-effect">Create New Question</button></a>
                    </div>
                    
                    @if(Session::has('messages'))
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    {{Session::get('messages')}}
                            </div>
                        </div>
                    </div>
                    @endif

                    @if(Session::has('warning'))
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                    {{Session::get('warning')}}
                            </div>
                        </div>
                    </div>
                    @endif
                    

                    <div class="table-responsive">
                        <table id="data-table-selection" class="table table-striped">
                            <thead>
                                <tr>
                                    <th data-column-id="id" data-visible="false">ID</th>
                                    <th data-column-id="question" data-formatter="question">Question</th>
                                    <th data-column-id="description" data-formatter="description" data-order="desc">Description</th>
                                    <th data-column-id="instruction" data-formatter="instruction">Instruction</th>
                                    <th data-column-id="groupdescription" data-formatter="groupdescription" data-visible="false">Group Description</th>
                                    <th data-column-id="answerdescription" data-formatter="answerdescription" data-visible="false">Answer Submit Desc</th>
                                    <th data-column-id="duration" data-css-class="elipsis" data-order="desc">Duration</th>
                                    <th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($questions as $question)
                                <tr data-row-id="{{$question->id}}">
                                    <td>{{$question->id}}</td>
                                    <td><p style="width:300px;max-height:200px; overflow-y:scroll;">{{$question->question}} {{$question->question_mm}}</p></td>
                                    <td><p style="width:300px;max-height:200px; overflow-y:scroll;">{!!$question->description!!} {!!$question->description_mm!!}</p></td>
                                    <td><p style="width:300px;max-height:200px; overflow-y:scroll;">{!!$question->instruction_about_game!!} <br> {!!$question->instruction_about_game_mm!!}</p></td>
                                    <td><p style="width:300px;max-height:200px; overflow-y:scroll;">{!!$question->group_description!!} <br> {!!$question->group_description_mm!!}</p></td>
                                    <td><p style="width:300px;max-height:200px; overflow-y:scroll;">{!!$question->answer_submit_description!!} <br>{!!$question->answer_submit_description_mm!!}</p></td>
                                    <td><p style="width:300px;">{!!date('d-M-Y h:i A', strtotime($question->start_date)). ' To '. date('d-M-Y h:i A', strtotime($question->end_date))!!}</p></td>
                                    <td></td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
               
                
            </div>
        </section>
@endsection

@section('scripts')
    <script src="{{Request::root()}}/vendors/bootgrid/jquery.bootgrid.min.js"></script>
    <script type="text/javascript">
            $(document).ready(function(){
                //Selection
                $("#data-table-selection").bootgrid({
                    css: {
                        icon: 'zmdi icon',
                        iconColumns: 'zmdi-view-module',
                        iconDown: 'zmdi-expand-more',
                        iconRefresh: 'zmdi-refresh',
                        iconUp: 'zmdi-expand-less'
                    },
                    selection: true,
                    multiSelect: true,
                    // rowSelect: true,
                    keepSelection: true,
                    formatters: {
                        "question": function(columns, rows) {
                            return "<div id='scrollbox'><p>"+rows.question+"</p></div>";
                        },
                        "description": function(columns, rows) {
                            return "<div id='scrollbox'><p>"+rows.description+"</p></div>";
                        },
                        "instruction": function(columns, rows) {
                            return "<div id='scrollbox'><p>"+rows.instruction+"</p></div>";
                        },
                        "groupdescription": function(columns, rows) {
                            return "<div id='scrollbox'><p>"+rows.groupdescription+"</p></div>";
                        },
                        "answerdescription": function(columns, rows) {
                            return "<div id='scrollbox'><p>"+rows.answerdescription+"</p></div>";
                        },
                        "commands": function(column, row) {
                            return "<a href='/admin/competition-question/"+row.id+"/edit'><button type=\"button\" class=\"btn btn-icon command-edit\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-edit\"></span></button> </a>" + 
                                "<a href='/admin/competition-question/"+row.id+"/delete'><button type=\"button\" class=\"btn btn-icon command-delete\" data-row-id=\"" + row.id + "\"><span class=\"zmdi zmdi-delete\"></span></button>";
                        }
                    }
                });
                
            });
        </script>
@endsection