<table class="table">
    <thead>
    <th>Objectid</th>
			<th>Name</th>
			<th>Userid</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($roles as $role)
        <tr>
            <td>{!! $role->objectId !!}</td>
			<td>{!! $role->name !!}</td>
			<td>{!! $role->user['username'] !!}</td>
            <td>
                <a href="{!! route('roles.edit', [$role->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('roles.delete', [$role->id]) !!}" onclick="return confirm('Are you sure wants to delete this Role?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
