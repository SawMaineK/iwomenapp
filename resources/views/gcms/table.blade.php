<table class="table">
    <thead>
    <th>Reg Id</th>
			<th>Device Id</th>
			<th>User Id</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($gcms as $gcm)
        <tr>
            <td>{!! $gcm->reg_id !!}</td>
			<td>{!! $gcm->device_id !!}</td>
			<td>{!! $gcm->user_id !!}</td>
            <td>
                <a href="{!! route('gcms.edit', [$gcm->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('gcms.delete', [$gcm->id]) !!}" onclick="return confirm('Are you sure wants to delete this Gcm?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
