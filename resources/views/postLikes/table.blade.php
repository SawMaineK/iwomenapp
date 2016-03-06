<table class="table">
    <thead>
    <th>Objectid</th>
			<th>Postid</th>
			<th>Userid</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($postLikes as $postLike)
        <tr>
            <td>{!! $postLike->objectId !!}</td>
			<td>{!! $postLike->postId !!}</td>
			<td>{!! $postLike->userId !!}</td>
            <td>
                <a href="{!! route('postLikes.edit', [$postLike->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('postLikes.delete', [$postLike->id]) !!}" onclick="return confirm('Are you sure wants to delete this PostLike?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
