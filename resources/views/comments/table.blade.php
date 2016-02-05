<table class="table">
    <thead>
    <th>Objectid</th>
			<th>Comment Contents</th>
			<th>Comment Created Time</th>
			<th>Postid</th>
			<th>Sticker Img Path</th>
			<th>Userid</th>
			<th>User Img Path</th>
			<th>User Name</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($comments as $comment)
        <tr>
            <td>{!! $comment->objectId !!}</td>
			<td>{!! $comment->comment_contents !!}</td>
			<td>{!! $comment->comment_created_time !!}</td>
			<td>{!! $comment->postId !!}</td>
			<td>{!! $comment->sticker_img_path !!}</td>
			<td>{!! $comment->userId !!}</td>
			<td>{!! $comment->user_img_path !!}</td>
			<td>{!! $comment->user_name !!}</td>
            <td>
                <a href="{!! route('comments.edit', [$comment->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('comments.delete', [$comment->id]) !!}" onclick="return confirm('Are you sure wants to delete this Comment?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
