<table class="table">
    <thead>
    <th>Post Id</th>
			<th>Name</th>
			<th>Name Mm</th>
			<th>Links Path</th>
			<th>Uploaded Date</th>
			<th>Isallow</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($subResourceDetailAudios as $subResourceDetailAudio)
        <tr>
            <td>{!! $subResourceDetailAudio->post_id !!}</td>
			<td>{!! $subResourceDetailAudio->name !!}</td>
			<td>{!! $subResourceDetailAudio->name_mm !!}</td>
			<td>{!! $subResourceDetailAudio->links_path !!}</td>
			<td>{!! $subResourceDetailAudio->uploaded_date !!}</td>
			<td>{!! $subResourceDetailAudio->isAllow !!}</td>
            <td>
                <a href="{!! route('subResourceDetailAudios.edit', [$subResourceDetailAudio->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('subResourceDetailAudios.delete', [$subResourceDetailAudio->id]) !!}" onclick="return confirm('Are you sure wants to delete this SubResourceDetailAudio?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
