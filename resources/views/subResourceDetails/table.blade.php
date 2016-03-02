<table class="table">
    <thead>
    <th>Authorname</th>
			<th>Author Id</th>
			<th>Author Img Url</th>
			<th>Isallow</th>
			<th>Objectid</th>
			<th>Posted Date</th>
			<th>Resource Id</th>
			<th>Sub Res Icon Img Url</th>
			<th>Sub Resouce Content Eng</th>
			<th>Sub Resouce Content Mm</th>
			<th>Sub Resource Title Eng</th>
			<th>Sub Resource Title Mm</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($subResourceDetails as $subResourceDetail)
        <tr>
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
