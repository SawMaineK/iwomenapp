<div class="table-responsive">
    <table id="data-table-command" class="table table-striped table-vmiddle">
        <thead>
            <th data-column-id="id" data-visible="false">id</th>
            <th data-column-id="objectId" data-visible="false">Objectid</th>
			<th data-column-id="author_img_path" data-visible="false">Author Img Path</th>
			<th data-column-id="isAllow">Isallow</th>
			<th data-column-id="resource_author_id">Resource Author Id</th>
			<th data-column-id="resource_author_name">Resource Author Name</th>
			<th data-column-id="resource_icon_img">Resource Icon Img</th>
			<th data-column-id="resource_title_eng">Resource Title Eng</th>
			<th data-column-id="resource_title_mm">Resource Title Mm</th>
            <th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
        </thead>
        <tbody>
        @foreach($subResourceDetails as $subResourceDetail)
            <tr>
                <td>{!! $subResourceDetail->id !!}</td>
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
</div>
