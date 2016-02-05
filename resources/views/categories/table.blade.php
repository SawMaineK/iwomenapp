<table class="table">
    <thead>
    <th>Objectid</th>
			<th>Name</th>
			<th>Image</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{!! $category->objectId !!}</td>
			<td>{!! $category->name !!}</td>
			<td>{!! $category->image !!}</td>
            <td>
                <a href="{!! route('categories.edit', [$category->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('categories.delete', [$category->id]) !!}" onclick="return confirm('Are you sure wants to delete this Category?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
