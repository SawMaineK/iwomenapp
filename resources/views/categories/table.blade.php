<div class="table-responsive">
    <table id="data-table-command" class="table table-striped table-vmiddle">
        <thead>
            <th data-column-id="id" data-visible="false">Id</th>
            <th data-column-id="objectId">Objectid</th>
            <th data-column-id="name">Name</th>
    		<th data-column-id="name">Name MM</th>
    		<th data-column-id="image"  data-formatter="image">Image</th>
            <th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{!! $category->id !!}</td>
                <td>{!! $category->objectId !!}</td>
                <td>{!! $category->name !!}</td>
    			<td>{!! $category->name_mm !!}</td>
    			<td>{!! $category->image !!}</td>
                <td>
                    <a href="{!! route('categories.edit', [$category->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="{!! route('categories.delete', [$category->id]) !!}" onclick="return confirm('Are you sure wants to delete this Category?')"><i class="glyphicon glyphicon-remove"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>