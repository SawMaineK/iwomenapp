<table class="table" id="data-table-selection">
    <thead>
    <th width="150px">Competition ID</th>
	<th width="300px">Answer</th>
    <th>Group</th>
    <th>User</th>
    <th width="300px">TLG Address</th>
    <th>Created At</th>
    <th>Correct Answer</th>
    <!-- <th width="50px">Action</th> -->
    </thead>
    <tbody>
    @foreach($mutipleAnswers as $mutipleAnswer)
        <tr>
            <td>{!! $mutipleAnswer->multipleQuestion->question_id !!}</td>
			<td>{!! $mutipleAnswer->answer !!}</td>
            <td>{!! $mutipleAnswer['user']['group_name'] !!}</td>
            <td>{!! $mutipleAnswer['user']['username'] !!}</td>
            <td>{!! $mutipleAnswer['user']['group_city'] !!}</td>
            <td>{!! date('Y-m-d h:i:s', strtotime($mutipleAnswer->created_at) - ((60*60) * 6.5))!!}</td>
            <td>
            @if( count($mutipleAnswer['competitionAnswers']) > 0)
                <a href="admin/competition-answers-uncorrect/{!! $mutipleAnswer->id !!}"><button type="button" class="btn btn-icon command-edit" data-row-id=""><span class="zmdi zmdi-close"></span></button> </a>
            @else
                <a href="admin/competition-answers-correct/{!! $mutipleAnswer->id !!}"><button type="button" class="btn btn-icon command-edit" data-row-id=""><span class="zmdi zmdi-check"></span></button> </a>
            @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
