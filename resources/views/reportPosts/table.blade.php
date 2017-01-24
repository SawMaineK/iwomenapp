<table class="table">
    <thead>
    <th>Postid</th>
			<th>Userid</th>
			<th>Point</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($reportPosts as $reportPost)
        <tr>
            <td>{!! $reportPost->postId !!}</td>
			<td>{!! $reportPost->userId !!}</td>
			<td>{!! $reportPost->point !!}</td>
            <td>
                <a href="{!! route('reportPosts.edit', [$reportPost->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('reportPosts.delete', [$reportPost->id]) !!}" onclick="return confirm('Are you sure wants to delete this reportPost?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
