<table class="table">
    <thead>
    <th>Objectid</th>
			<th>Content</th>
			<th>Contenttype</th>
			<th>Content Mm</th>
			<th>Image</th>
			<th>Likes</th>
			<th>Postuploadname</th>
			<th>Postuploadpersonimg</th>
			<th>Postuploadeddate</th>
			<th>Suggest Section</th>
			<th>Suggest Section Eng</th>
			<th>Title</th>
			<th>Titlemm</th>
			<th>Userid</th>
			<th>Userrelation</th>
			<th>Videoid</th>
			<th>Audiofile</th>
			<th>Comment Count</th>
			<th>Isallow</th>
			<th>Postuploaduserimgpath</th>
			<th>Share Count</th>
			<th>Category Id</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <td>{!! $post->objectId !!}</td>
			<td>{!! $post->content !!}</td>
			<td>{!! $post->contentType !!}</td>
			<td>{!! $post->content_mm !!}</td>
			<td>{!! $post->image !!}</td>
			<td>{!! $post->likes !!}</td>
			<td>{!! $post->postUploadName !!}</td>
			<td>{!! $post->postUploadPersonImg !!}</td>
			<td>{!! $post->postUploadedDate !!}</td>
			<td>{!! $post->suggest_section !!}</td>
			<td>{!! $post->suggest_section_eng !!}</td>
			<td>{!! $post->title !!}</td>
			<td>{!! $post->titleMm !!}</td>
			<td>{!! $post->userId !!}</td>
			<td>{!! $post->userRelation !!}</td>
			<td>{!! $post->videoId !!}</td>
			<td>{!! $post->audioFile !!}</td>
			<td>{!! $post->comment_count !!}</td>
			<td>{!! $post->isAllow !!}</td>
			<td>{!! $post->postUploadUserImgPath !!}</td>
			<td>{!! $post->share_count !!}</td>
			<td>{!! $post->category_id !!}</td>
            <td>
                <a href="{!! route('posts.edit', [$post->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('posts.delete', [$post->id]) !!}" onclick="return confirm('Are you sure wants to delete this Post?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
