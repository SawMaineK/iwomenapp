<table class="table">
    <thead>
    <th>Objectid</th>
			<th>Postid</th>
			<th>Userid</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($resourceLikes as $resourceLike)
        <tr>
            <td>{!! $resourceLike->objectId !!}</td>
			<td>{!! $resourceLike->postId !!}</td>
			<td>{!! $resourceLike->userId !!}</td>
            <td>
                <a href="{!! route('resourceLikes.edit', [$resourceLike->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('resourceLikes.delete', [$resourceLike->id]) !!}" onclick="return confirm('Are you sure wants to delete this ResourceLike?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
