<div class="table-responsive">
	<table id="data-table-command" class="table table-striped table-vmiddle">
	    <thead>
	        <th data-column-id="id" data-visible="false">id</th>
		    <th data-column-id="Authorname">Authorname</th>
			<th data-column-id="AuthorId" data-visible="false">Author Id</th>
			<th data-column-id="AuthorImgUrl" data-formatter="AuthorImgUrl">Author Img Url</th>
			<th data-column-id="Isallow">Isallow</th>
			<th data-column-id="Objectid">Objectid</th>
			<th data-column-id="postdate">Posted Date</th>
			<th data-column-id="resourceid">Resource Id</th>
			<th data-column-id="subresiconimgurl" data-formatter="subresiconimgurl">Sub Res Icon Img Url</th>
			<th data-column-id="subrescontenteng" data-formatter="subrescontenteng">Sub Resouce Content Eng</th>
			<th data-column-id="subrescontentmm" data-formatter="subrescontentmm">Sub Resouce Content Mm</th>
			<th data-column-id="subrestitleeng" data-formatter="subrestitleeng">Sub Resource Title Eng</th>
			<th data-column-id="subrestitlemm" data-formatter="subrestitlemm">Sub Resource Title Mm</th>
		    <th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
	    </thead>
	    <tbody>
	    @foreach($subResourceDetails as $subResourceDetail)
	        <tr>
	            <td>{!! $subResourceDetail->id !!}</td>
	            <td>{!! $subResourceDetail->authorName !!}</td>
				<td>{!! $subResourceDetail->author_id !!}</td>
				<td>{!! $subResourceDetail->author_img_url !!}</td>
				<td>{!! $subResourceDetail->isAllow !!}</td>
				<td>{!! $subResourceDetail->objectId !!}</td>
				<td>{!! $subResourceDetail->posted_date !!}</td>
				<td>{!! $subResourceDetail->resource_id !!}</td>
				<td>{!! $subResourceDetail->sub_res_icon_img_url !!}</td>
				<td>{!! $subResourceDetail->sub_resouce_content_eng !!}</td>
				<td>{!! $subResourceDetail->sub_resouce_content_mm !!}</td>
				<td>{!! $subResourceDetail->sub_resource_title_eng !!}</td>
				<td>{!! $subResourceDetail->sub_resource_title_mm !!}</td>
	            <td>
	                <a href="{!! route('subResourceDetails.edit', [$subResourceDetail->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
	                <a href="{!! route('subResourceDetails.delete', [$subResourceDetail->id]) !!}" onclick="return confirm('Are you sure wants to delete this SubResourceDetail?')"><i class="glyphicon glyphicon-remove"></i></a>
	            </td>
	        </tr>
	    @endforeach
	    </tbody>
	</table>
</div>
