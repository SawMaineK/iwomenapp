<div  class="table-responsive">
    <table id="data-table-command" class="table table-striped table-vmiddle">
        <thead>
            <th data-column-id="id" data-visible="false">Id</th>
            <th data-column-id="competitionid" width="150px">Competition ID</th>
            <th data-column-id="question" width="300px">Question</th>
        	<th data-column-id="answer" width="300px">Answer</th>
            <th data-column-id="group">Group</th>
            <th data-column-id="user">User</th>
            <th data-column-id="tlgaddress" width="300px">TLG Address</th>
            <th data-column-id="createdat">Created At</th>
            <th data-column-id="correctornot" data-visible="false">Status</th>
            <th data-column-id="correctanswer" data-formatter="correctanswer">Correct Answer</th>
            <!-- <th width="50px">Action</th> -->
        </thead>
        <tbody>
        @foreach($mutipleAnswers as $mutipleAnswer)
            <tr>
                <td>{!! $mutipleAnswer->id !!}</td>
                <td>{!! $mutipleAnswer->multipleQuestion->question_id !!}</td>
                <td>{!! $mutipleAnswer->multipleQuestion->question !!}<br>{!! $mutipleAnswer->multipleQuestion->question_mm !!}</td>
    			<td>{!! $mutipleAnswer->answer !!}</td>
                <td>{!! $mutipleAnswer['user']['group_name'] !!}</td>
                <td>{!! $mutipleAnswer['user']['username'] !!}</td>
                <td>{!! $mutipleAnswer['user']['group_city'] !!}</td>
                <td>{!! date('Y-m-d h:i:s', strtotime($mutipleAnswer->created_at) - ((60*60) * 6.5))!!}</td>
                <td>{!! count($mutipleAnswer['competitionAnswers']) !!}</td>
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
</div>