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
    @foreach($resources as $resources)
        <tr>
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
