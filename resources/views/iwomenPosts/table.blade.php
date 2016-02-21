<div class="table-responsive">
    <table id="data-table-command" class="table table-striped table-vmiddle">
	    <thead>
	    	<th data-column-id="id" data-visible="false">id</th>
	    	<th data-column-id="objectId" data-visible="false">Objectid</th>
			<th data-column-id="audioFile" data-visible="false">Audiofile</th>
			<th data-column-id="authorId" data-visible="false">Authorid</th>
			<th data-column-id="comment_count" data-visible="false">Comment Count</th>
			<th data-column-id="content">Content</th>
			<th data-column-id="contentType">Contenttype</th>
			<th data-column-id="content_mm">Content Mm</th>
			<th data-column-id="credit_link">Credit Link</th>
			<th data-column-id="credit_link_mm">Credit Link Mm</th>
			<th data-column-id="credit_logo_url">Credit Logo Url</th>
			<th data-column-id="credit_name">Credit Name</th>
			<th data-column-id="image" data-formatter="image">Image</th>
			<th data-column-id="isAllow">Isallow</th>
			<th data-column-id="likes">Likes</th>
			<th data-column-id="postUploadName">Postuploadname</th>
			<th data-column-id="postUploadPersonImg" data-formatter="postUploadPersonImg">Postuploadpersonimg</th>
			<th data-column-id="postUploadUserImgPath" data-formatter="postUploadUserImgPath">Postuploaduserimgpath</th>
			<th data-column-id="postUploadedDate">Postuploadeddate</th>
			<th data-column-id="post_author_role">Post Author Role</th>
			<th data-column-id="post_author_role_mm">Post Author Role Mm</th>
			<th data-column-id="share_count">Share Count</th>
			<th data-column-id="suggest_section_eng">Suggest Section Eng</th>
			<th data-column-id="title">Title</th>
			<th data-column-id="titleMm">Titlemm</th>
			<th data-column-id="userId">Userid</th>
			<th data-column-id="videoId">Videoid</th>
	    	<th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
	    </thead>
	    <tbody>
	    @foreach($iwomenPosts as $iwomenPost)
	        <tr>
	            <td>{!! $iwomenPost->id !!}</td>
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
</div>