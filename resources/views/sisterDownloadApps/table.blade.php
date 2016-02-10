<div class="table-responsive">
    <table id="data-table-command" class="table table-striped table-vmiddle">
        <thead>
            <th data-column-id="id" data-visible="false">Id</th>
            <th data-column-id="objectId">Objectid</th>
			<th data-column-id="app_img" data-formatter="app_img">App Img</th>
			<th data-column-id="app_link">App Link</th>
			<th data-column-id="app_name">App Name</th>
			<th data-column-id="app_package_name">App Package Name</th>
			<th data-column-id="isAllow">Isallow</th>
            <th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
        </thead>
        <tbody>
        @foreach($sisterDownloadApps as $sisterDownloadApp)
            <tr>
                <td>{!! $sisterDownloadApp->id !!}</td>
                <td>{!! $sisterDownloadApp->objectId !!}</td>
    			<td>{!! $sisterDownloadApp->app_img !!}</td>
    			<td>{!! $sisterDownloadApp->app_link !!}</td>
    			<td>{!! $sisterDownloadApp->app_name !!}</td>
    			<td>{!! $sisterDownloadApp->app_package_name !!}</td>
    			<td>{!! $sisterDownloadApp->isAllow !!}</td>
                <td>
                    <a href="{!! route('sisterDownloadApps.edit', [$sisterDownloadApp->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="{!! route('sisterDownloadApps.delete', [$sisterDownloadApp->id]) !!}" onclick="return confirm('Are you sure wants to delete this SisterDownloadApp?')"><i class="glyphicon glyphicon-remove"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>