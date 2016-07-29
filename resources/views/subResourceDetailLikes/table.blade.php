<table class="table">
    <thead>
    <th>Objectid</th>
			<th>Postid</th>
			<th>Userid</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($subResourceDetailLikes as $subResourceDetailLike)
        <tr>
            <td>{!! $subResourceDetailLike->objectId !!}</td>
			<td>{!! $subResourceDetailLike->postId !!}</td>
			<td>{!! $subResourceDetailLike->userId !!}</td>
            <td>
                <a href="{!! route('subResourceDetailLikes.edit', [$subResourceDetailLike->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('subResourceDetailLikes.delete', [$subResourceDetailLike->id]) !!}" onclick="return confirm('Are you sure wants to delete this SubResourceDetailLike?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
