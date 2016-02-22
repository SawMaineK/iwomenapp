<div class="table-responsive">
    <table id="data-table-command" class="table table-striped table-vmiddle">
        <thead>
            <th data-column-id="id" data-visible="false">Id</th>
            <th data-column-id="objectId" data-visible="false">Objectid</th>
			<th data-column-id="comment_contents">Comment Contents</th>
			<th data-column-id="comment_created_time">Comment Created Time</th>
			<th data-column-id="postId">Postid</th>
			<th data-column-id="sticker_img_path" data-formatter="sticker_img_path">Sticker Img Path</th>
			<th data-column-id="userId">Userid</th>
			<th data-column-id="user_img_path" data-formatter="user_img_path">User Img Path</th>
			<th data-column-id="user_name">User Name</th>
            <th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
        </thead>
        <tbody>
        @foreach($comments as $comment)
            <tr>
                <td>{!! $comment->id !!}</td>
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
</div>
