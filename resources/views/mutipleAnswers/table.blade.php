<table class="table">
    <thead>
    <th>Mutiple Question Id</th>
			<th width="300px">Answer</th>
            <th>User</th>
            <th>Created At</th>
            <th>Correct Answer</th>
    <!-- <th width="50px">Action</th> -->
    </thead>
    <tbody>
    @foreach($mutipleAnswers as $mutipleAnswer)
        <tr>
            <td>{!! $mutipleAnswer->mutiple_question_id !!}</td>
			<td>{!! $mutipleAnswer->answer !!}</td>
            <td>{!! $mutipleAnswer['user']['username'] !!}</td>
            <td>{!! date('Y-m-d h:i:s', strtotime($mutipleAnswer->created_at) - ((60*60) * 6.5))!!}</td>
            <td>
            @if( count($mutipleAnswer['competitionAnswers']) > 0)
                <a href="admin/competition-answers-uncorrect/{!! $mutipleAnswer->id !!}"><button type="button" class="btn btn-icon command-edit" data-row-id=""><span class="zmdi zmdi-close"></span></button> </a>
            @else
                <a href="admin/competition-answers-correct/{!! $mutipleAnswer->id !!}"><button type="button" class="btn btn-icon command-edit" data-row-id=""><span class="zmdi zmdi-check"></span></button> </a>
            @endif
            </td>
            <!-- <td>
                <a href="{!! route('mutipleAnswers.edit', [$mutipleAnswer->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('mutipleAnswers.delete', [$mutipleAnswer->id]) !!}" onclick="return confirm('Are you sure wants to delete this MutipleAnswer?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td> -->
        </tr>
    @endforeach
    </tbody>
</table>
