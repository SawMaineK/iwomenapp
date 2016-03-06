<table class="table">
    <thead>
    <th>Objectid</th>
			<th>Postid</th>
			<th>Userid</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($iwomenPostLikes as $iwomenPostLike)
        <tr>
            <td>{!! $iwomenPostLike->objectId !!}</td>
			<td>{!! $iwomenPostLike->postId !!}</td>
			<td>{!! $iwomenPostLike->userId !!}</td>
            <td>
                <a href="{!! route('iwomenPostLikes.edit', [$iwomenPostLike->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('iwomenPostLikes.delete', [$iwomenPostLike->id]) !!}" onclick="return confirm('Are you sure wants to delete this IwomenPostLike?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
