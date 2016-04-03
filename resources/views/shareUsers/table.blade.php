<table class="table">
    <thead>
    <th>User Id</th>
			<th>Share Objectid</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($shareUsers as $shareUser)
        <tr>
            <td>{!! $shareUser->user_id !!}</td>
			<td>{!! $shareUser->share_objectId !!}</td>
            <td>
                <a href="{!! route('shareUsers.edit', [$shareUser->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('shareUsers.delete', [$shareUser->id]) !!}" onclick="return confirm('Are you sure wants to delete this ShareUser?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
