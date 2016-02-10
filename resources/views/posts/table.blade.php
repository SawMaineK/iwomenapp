<div class="table-responsive">
	<table id="data-table-command" class="table table-striped table-vmiddle">
	    <thead>
		    <th data-column-id="id" data-visible="false">Id</th>
		    <th data-column-id="objectId" data-visible="false">Objectid</th>
			<th data-column-id="content" data-visible="false">Content</th>
			<th data-column-id="contentType">Contenttype</th>
			<th data-column-id="content_mm">Content Mm</th>
			<th data-column-id="image" data-formatter="image">Image</th>
			<th data-column-id="likes">Likes</th>
			<th data-column-id="postUploadName">Postuploadname</th>
			<th data-column-id="postUploadPersonImg" data-formatter="postUploadPersonImg">Postuploadpersonimg</th>
			<th data-column-id="postUploadedDate">Postuploadeddate</th>
			<th data-column-id="suggest_section">Suggest Section</th>
			<th data-column-id="suggest_section_eng">Suggest Section Eng</th>
			<th data-column-id="title">Title</th>
			<th data-column-id="titleMm">Titlemm</th>
			<th data-column-id="userId">Userid</th>
			<th data-column-id="userRelation">Userrelation</th>
			<th data-column-id="videoId">Videoid</th>
			<th data-column-id="audioFile">Audiofile</th>
			<th data-column-id="comment_count">Comment Count</th>
			<th data-column-id="isAllow">Isallow</th>
			<th data-column-id="postUploadUserImgPath">Postuploaduserimgpath</th>
			<th data-column-id="share_count">Share Count</th>
			<th data-column-id="category_id">Category Id</th>
			<th data-column-id="commands" data-formatter="commands" data-sortable="false">Commands</th>
	    </thead>
	    <tbody>
	    @foreach($posts as $post)
	        <tr>
	            <td>{!! $post->id !!}</td>
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
	                <!-- <a href="{!! route('posts.edit', [$post->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
	                <a href="{!! route('posts.delete', [$post->id]) !!}" onclick="return confirm('Are you sure wants to delete this Post?')"><i class="glyphicon glyphicon-remove"></i></a> -->
	            </td>
	        </tr>
	    @endforeach
	    </tbody>
	</table>
</div>