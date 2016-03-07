<table class="table">
    <thead>
    <th>Name</th>
			<th>Version Id</th>
			<th>Version Name</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($apks as $apk)
        <tr>
            <td>{!! $apk->name !!}</td>
			<td>{!! $apk->version_id !!}</td>
			<td>{!! $apk->version_name !!}</td>
            <td>
                <a href="{!! route('apks.edit', [$apk->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('apks.delete', [$apk->id]) !!}" onclick="return confirm('Are you sure wants to delete this Apk?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
