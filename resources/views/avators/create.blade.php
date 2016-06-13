@extends('layouts.app')

@section('styles')
    <link href="{{Request::root()}}/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet">
    <link href="{{Request::root()}}/vendors/bower_components/nouislider/distribute/jquery.nouislider.min.css" rel="stylesheet">
    <link href="{{Request::root()}}/vendors/bower_components/summernote/dist/summernote.css" rel="stylesheet">
    <link href="{{Request::root()}}/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="{{Request::root()}}/vendors/farbtastic/farbtastic.css" rel="stylesheet">
    <link href="{{Request::root()}}/vendors/chosen_v1.4.2/chosen.min.css" rel="stylesheet">
    <link href="{{Request::root()}}/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="card">
    <div class="card-header ch-alt">
        <h2>Create New Author <small></small></h2>
    </div>
    
    <div class="card-body card-padding">

		<div class="row">

		    @include('common.errors')

		    {!! Form::open(['route' => 'avators.store','enctype'=>'multipart/form-data']) !!}

		        @include('avators.fields')

		    {!! Form::close() !!}
		</div>
	</div>
</div>
@endsection


@section('scripts')
    <script src="{{Request::root()}}/vendors/chosen_v1.4.2/chosen.jquery.min.js"></script>
    <script src="{{Request::root()}}/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
    <script src="{{Request::root()}}/vendors/fileinput/fileinput.min.js"></script>
    <script src="{{Request::root()}}/vendors/input-mask/input-mask.min.js"></script>
    <script src="{{Request::root()}}/vendors/farbtastic/farbtastic.min.js"></script>
    <script src="{{Request::root()}}/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
@endsection
