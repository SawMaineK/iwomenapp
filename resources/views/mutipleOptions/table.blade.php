<table class="table">
    <thead>
    <th>Multiple Question</th>
			<th>Option</th>
			<th>Option Mm</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($mutipleOptions as $mutipleOption)
        <tr>
            <td>{!! $mutipleOption->mutiple_question_id !!}</td>
			<td>{!! $mutipleOption->option !!}</td>
			<td>{!! $mutipleOption->option_mm !!}</td>
            <td>
                <a href="{!! route('mutipleOptions.edit', [$mutipleOption->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('mutipleOptions.delete', [$mutipleOption->id]) !!}" onclick="return confirm('Are you sure wants to delete this MutipleOption?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
