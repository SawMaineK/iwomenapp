@extends('layouts.app')

@section('title', 'Competition Answer Update')
@section('content')
<section id="content">
    <div class="container">
        <div class="block-header hide">
            <h2>Update Competition Answer</h2>
        </div>
	
		<div class="card">
		    <div class="listview lv-bordered lv-lg">
	            <div class="lv-header-alt clearfix">
	                <h2 class="lvh-label hidden-xs">Update Competition Answer</h2>
	            </div>
	        </div>
		    @if ($errors->has())
		        <div class="row">
		        	<div class="col-sm-12">
				        <div class="alert alert-danger alert-dismissible" role="alert">
			                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
			                    @foreach ($errors->all() as $key=>$error)
			                     ({{$key+1}}) {{ $error }} &nbsp;        
			                    @endforeach
			            </div>
		            </div>
	            </div>
	        @endif

	        <div class="card-body card-padding lv-body">
	            <form action="/admin/competition-answer/{{$answer->id}}/update" class="form-horizontal" method="post" role="form">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Group Name</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                            	<input type='text' class="form-control" value="{{$answer->competitiongroupuser->group_name}}" name="group_name">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Group Name (Myanmar)</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                            	<input type='text' class="form-control" value="{{$answer->competitiongroupuser->group_name_mm}}" name="group_name_mm">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Answer</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                            	<textarea class="col-sm-12"    rows="5" name="answer">{{$answer->answer}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Answer (Myanmar)</label>
                        <div class="col-sm-10">
                            <div class="fg-line">
                            	<textarea class="col-sm-12"	rows="5" name="answer_mm">{{$answer->answer_mm}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                        <div class="col-sm-offset-2 col-sm-10">
                    		<button type="submit" id='save'  class="btn btn-primary btn-sm m-t-10 waves-effect">Update Answer</button>
                    	</div>
                    </div>

		        </form>
	            
	        </div>
	        <br/>
	    </div>
	</div>
</section>
@endsection

@section('scripts')
    <!-- @parent -->
    <script type="text/javascript">
	     (function(){
	     	$('#save').click(function(){
	     		alert($('.html-editor-question').code()[0]);
	     	});
	     });
    </script>
@endsection


