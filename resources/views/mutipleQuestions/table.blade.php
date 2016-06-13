<div class="table-responsive">
    <table id="data-table-command" class="table table-striped table-vmiddle">
        <thead>
            <th data-column-id="id" data-visible="false">Id</th>
            <th data-column-id="questionid">Question Id</th>
			<th data-column-id="type">Type</th>
			<th data-column-id="question">Question</th>
			<th data-column-id="questionmm">Question Mm</th>
            <th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
        </thead>
        <tbody>
        @foreach($mutipleQuestions as $mutipleQuestion)
            <tr>
                <td>{!! $mutipleQuestion->id !!}</td>
                <td>{!! $mutipleQuestion->question_id !!}</td>
    			<td>{!! $mutipleQuestion->type !!}</td>
    			<td>{!! $mutipleQuestion->question !!}</td>
    			<td>{!! $mutipleQuestion->question_mm !!}</td>
                <td>
                    <a href="{!! route('mutipleQuestions.edit', [$mutipleQuestion->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="{!! route('mutipleQuestions.delete', [$mutipleQuestion->id]) !!}" onclick="return confirm('Are you sure wants to delete this MutipleQuestion?')"><i class="glyphicon glyphicon-remove"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
