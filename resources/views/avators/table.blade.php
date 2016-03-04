<table class="table">
    <thead>
    <th>Objectid</th>
			<th>Avatorimg</th>
			<th>Avatorimgpath</th>
			<th>Avatorname</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($avators as $avator)
        <tr>
            <td>{!! $avator->objectId !!}</td>
			<td>{!! $avator->avatorImg !!}</td>
			<td>{!! $avator->avatorImgPath !!}</td>
			<td>{!! $avator->avatorName !!}</td>
            <td>
                <a href="{!! route('avators.edit', [$avator->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('avators.delete', [$avator->id]) !!}" onclick="return confirm('Are you sure wants to delete this Avator?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
