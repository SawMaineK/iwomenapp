<table class="table">
    <thead>
    <th>Objectid</th>
			<th>App Img</th>
			<th>App Link</th>
			<th>App Name</th>
			<th>App Package Name</th>
			<th>Isallow</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($sisterDownloadApps as $sisterDownloadApp)
        <tr>
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
