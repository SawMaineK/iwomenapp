<table class="table">
    <thead>
    <th>Objectid</th>
			<th>Authorimg</th>
			<th>Authorinfoeng</th>
			<th>Authorinfomm</th>
			<th>Authorname</th>
			<th>Authortitleeng</th>
			<th>Authortitlemm</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($authors as $author)
        <tr>
            <td>{!! $author->objectId !!}</td>
			<td>{!! $author->authorImg !!}</td>
			<td>{!! $author->authorInfoEng !!}</td>
			<td>{!! $author->authorInfoMM !!}</td>
			<td>{!! $author->authorName !!}</td>
			<td>{!! $author->authorTitleEng !!}</td>
			<td>{!! $author->authorTitleMM !!}</td>
            <td>
                <a href="{!! route('authors.edit', [$author->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('authors.delete', [$author->id]) !!}" onclick="return confirm('Are you sure wants to delete this Author?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
