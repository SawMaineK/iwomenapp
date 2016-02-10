<div class="table-responsive">
    <table id="data-table-command" class="table table-striped table-vmiddle">

        <thead>
            <th data-column-id="id" data-visible="false">id</th>
            <th data-column-id="objectId">Objectid</th>
			<th data-column-id="stickerImg" data-formatter="stickerImg">Stickerimg</th>
			<th data-column-id="stickerImgPath">Stickerimgpath</th>
			<th data-column-id="stickerName">Stickername</th>
            <th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
        </thead>
        <tbody>
        @foreach($stickerStores as $stickerStore)
            <tr>
                <td>{!! $stickerStore->id !!}</td>
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
