<div class="table-responsive">
    <table id="data-table-command" class="table table-striped table-vmiddle">
        <thead>
            <th data-column-id="id" data-visible="false">id</th>
            <th data-column-id="objectId" data-visible="false">Objectid</th>
			<th data-column-id="author_img_path" data-formatter="author_img_path">Author Img Path</th>
			<th data-column-id="isAllow">Isallow</th>
			<th data-column-id="resource_author_id">Resource Author Id</th>
			<th data-column-id="resource_author_name">Resource Author Name</th>
			<th data-column-id="resource_icon_img" data-formatter="resource_icon_img">Resource Icon Img</th>
			<th data-column-id="resource_title_eng">Resource Title Eng</th>
			<th data-column-id="resource_title_mm">Resource Title Mm</th>
            <th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
        </thead>
        <tbody>
        @foreach($resources as $resources)
            <tr>
                <td>{!! $resources->id !!}</td>
                <td>{!! $resources->objectId !!}</td>
    			<td>{!! $resources->author_img_path !!}</td>
    			<td>{!! $resources->isAllow !!}</td>
    			<td>{!! $resources->resource_author_id !!}</td>
    			<td>{!! $resources->resource_author_name !!}</td>
    			<td>{!! $resources->resource_icon_img !!}</td>
    			<td>{!! $resources->resource_title_eng !!}</td>
    			<td>{!! $resources->resource_title_mm !!}</td>
                <td>
                    <a href="{!! route('resources.edit', [$resources->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="{!! route('resources.delete', [$resources->id]) !!}" onclick="return confirm('Are you sure wants to delete this Resources?')"><i class="glyphicon glyphicon-remove"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>