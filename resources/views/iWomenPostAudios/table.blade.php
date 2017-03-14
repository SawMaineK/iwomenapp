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
    @foreach($iWomenPostAudios as $iWomenPostAudio)
        <tr>
            <td>{!! $iWomenPostAudio->post_id !!}</td>
			<td>{!! $iWomenPostAudio->name !!}</td>
			<td>{!! $iWomenPostAudio->name_mm !!}</td>
			<td>{!! $iWomenPostAudio->links_path !!}</td>
			<td>{!! $iWomenPostAudio->uploaded_date !!}</td>
			<td>{!! $iWomenPostAudio->isAllow !!}</td>
            <td>
                <a href="{!! route('iWomenPostAudios.edit', [$iWomenPostAudio->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('iWomenPostAudios.delete', [$iWomenPostAudio->id]) !!}" onclick="return confirm('Are you sure wants to delete this IWomenPostAudio?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
