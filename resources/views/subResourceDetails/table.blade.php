<table class="table">
    <thead>
    <th>Objectid</th>
			<th>Author Img Path</th>
			<th>Isallow</th>
			<th>Resource Author Id</th>
			<th>Resource Author Name</th>
			<th>Resource Icon Img</th>
			<th>Resource Title Eng</th>
			<th>Resource Title Mm</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($subResourceDetails as $subResourceDetail)
        <tr>
            <td>{!! $subResourceDetail->objectId !!}</td>
			<td>{!! $subResourceDetail->author_img_path !!}</td>
			<td>{!! $subResourceDetail->isAllow !!}</td>
			<td>{!! $subResourceDetail->resource_author_id !!}</td>
			<td>{!! $subResourceDetail->resource_author_name !!}</td>
			<td>{!! $subResourceDetail->resource_icon_img !!}</td>
			<td>{!! $subResourceDetail->resource_title_eng !!}</td>
			<td>{!! $subResourceDetail->resource_title_mm !!}</td>
            <td>
                <a href="{!! route('subResourceDetails.edit', [$subResourceDetail->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('subResourceDetails.delete', [$subResourceDetail->id]) !!}" onclick="return confirm('Are you sure wants to delete this SubResourceDetail?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
