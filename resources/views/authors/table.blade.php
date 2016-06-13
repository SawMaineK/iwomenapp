<div class="table-responsive">
    <table id="data-table-command" class="table table-striped table-vmiddle">
        <thead>
            <th data-column-id="id" data-visible="false">id</th>
            <th data-column-id="objectId" data-visible="false">Objectid</th>
    		<th data-column-id="authorImg" data-formatter="authorImg">Authorimg</th>
    		<th data-column-id="authorInfoEng" data-formatter="authorInfoEng">Authorinfoeng</th>
    		<th data-column-id="authorInfoMM" data-formatter="authorInfoMM">Authorinfomm</th>
    		<th data-column-id="authorName">Authorname</th>
    		<th data-column-id="authorTitleEng">Authortitleeng</th>
    		<th data-column-id="authorTitleMM">Authortitlemm</th>
            <th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
        </thead>
        <tbody>
        @foreach($authors as $author)
            <tr>
                <td>{!! $author->id !!}</td>
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
</div>
