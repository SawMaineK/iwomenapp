<div class="table-responsive">
    <table id="data-table-command" class="table table-striped table-vmiddle">
        <thead>
            <th data-column-id="id" data-visible="false">id</th>
            <th data-column-id="Objectid" data-visible="false">Objectid</th>
			<th data-column-id="Avatorimg">Avatorimg</th>
			<th data-column-id="Avatorimgpath">Avatorimgpath</th>
			<th data-column-id="Avatorname">Avatorname</th>
            <th width="50px" data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
        </thead>
        <tbody>
        @foreach($avators as $avator)
            <tr>
                <td>{!! $avator->id !!}</td>
                <td>{!! $avator->objectId !!}</td>
    			<td>{!! $avator->avatorImg !!}</td>
    			<td>{!! $avator->avatorImgPath !!}</td>
    			<td>{!! $avator->avatorName !!}</td>
                <td>
                    <a href="{!! route('avators.edit', [$avator->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="{!! route('avators.delete', [$avator->id]) !!}" onclick="return confirm('Are you sure wants to delete this Avator?')"><i class="glyphicon glyphicon-remove"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
