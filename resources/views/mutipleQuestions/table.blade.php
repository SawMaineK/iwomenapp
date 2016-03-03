<table class="table">
    <thead>
    <th>Question Id</th>
			<th>Type</th>
			<th>Question</th>
			<th>Question Mm</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($mutipleQuestions as $mutipleQuestion)
        <tr>
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
