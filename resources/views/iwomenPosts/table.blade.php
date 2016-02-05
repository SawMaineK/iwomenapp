<table class="table">
    <thead>
    <th>Objectid</th>
			<th>Audiofile</th>
			<th>Authorid</th>
			<th>Comment Count</th>
			<th>Content</th>
			<th>Contenttype</th>
			<th>Content Mm</th>
			<th>Credit Link</th>
			<th>Credit Link Mm</th>
			<th>Credit Logo Url</th>
			<th>Credit Name</th>
			<th>Image</th>
			<th>Isallow</th>
			<th>Likes</th>
			<th>Postuploadname</th>
			<th>Postuploadpersonimg</th>
			<th>Postuploaduserimgpath</th>
			<th>Postuploadeddate</th>
			<th>Post Author Role</th>
			<th>Post Author Role Mm</th>
			<th>Share Count</th>
			<th>Suggest Section Eng</th>
			<th>Title</th>
			<th>Titlemm</th>
			<th>Userid</th>
			<th>Videoid</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($iwomenPosts as $iwomenPost)
        <tr>
            <td>{!! $iwomenPost->objectId !!}</td>
			<td>{!! $iwomenPost->audioFile !!}</td>
			<td>{!! $iwomenPost->authorId !!}</td>
			<td>{!! $iwomenPost->comment_count !!}</td>
			<td>{!! $iwomenPost->content !!}</td>
			<td>{!! $iwomenPost->contentType !!}</td>
			<td>{!! $iwomenPost->content_mm !!}</td>
			<td>{!! $iwomenPost->credit_link !!}</td>
			<td>{!! $iwomenPost->credit_link_mm !!}</td>
			<td>{!! $iwomenPost->credit_logo_url !!}</td>
			<td>{!! $iwomenPost->credit_name !!}</td>
			<td>{!! $iwomenPost->image !!}</td>
			<td>{!! $iwomenPost->isAllow !!}</td>
			<td>{!! $iwomenPost->likes !!}</td>
			<td>{!! $iwomenPost->postUploadName !!}</td>
			<td>{!! $iwomenPost->postUploadPersonImg !!}</td>
			<td>{!! $iwomenPost->postUploadUserImgPath !!}</td>
			<td>{!! $iwomenPost->postUploadedDate !!}</td>
			<td>{!! $iwomenPost->post_author_role !!}</td>
			<td>{!! $iwomenPost->post_author_role_mm !!}</td>
			<td>{!! $iwomenPost->share_count !!}</td>
			<td>{!! $iwomenPost->suggest_section_eng !!}</td>
			<td>{!! $iwomenPost->title !!}</td>
			<td>{!! $iwomenPost->titleMm !!}</td>
			<td>{!! $iwomenPost->userId !!}</td>
			<td>{!! $iwomenPost->videoId !!}</td>
            <td>
                <a href="{!! route('iwomenPosts.edit', [$iwomenPost->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('iwomenPosts.delete', [$iwomenPost->id]) !!}" onclick="return confirm('Are you sure wants to delete this IwomenPost?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
