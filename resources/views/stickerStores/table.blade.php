<table class="table">
    <thead>
    <th>Objectid</th>
			<th>Stickerimg</th>
			<th>Stickerimgpath</th>
			<th>Stickername</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($stickerStores as $stickerStore)
        <tr>
            <td>{!! $stickerStore->objectId !!}</td>
			<td>{!! $stickerStore->stickerImg !!}</td>
			<td>{!! $stickerStore->stickerImgPath !!}</td>
			<td>{!! $stickerStore->stickerName !!}</td>
            <td>
                <a href="{!! route('stickerStores.edit', [$stickerStore->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('stickerStores.delete', [$stickerStore->id]) !!}" onclick="return confirm('Are you sure wants to delete this StickerStore?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
