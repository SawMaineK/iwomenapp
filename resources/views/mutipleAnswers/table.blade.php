<table class="table">
    <thead>
    <th>Mutiple Question Id</th>
			<th>Answer</th>
            <th>User</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($mutipleAnswers as $mutipleAnswer)
        <tr>
            <td>{!! $mutipleAnswer->mutiple_question_id !!}</td>
			<td>{!! $mutipleAnswer->answer !!}</td>
            <td>{!! $mutipleAnswer['user']['username'] !!}</td>
            <td>
                <a href="{!! route('mutipleAnswers.edit', [$mutipleAnswer->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('mutipleAnswers.delete', [$mutipleAnswer->id]) !!}" onclick="return confirm('Are you sure wants to delete this MutipleAnswer?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
