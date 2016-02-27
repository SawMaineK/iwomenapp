<table class="table">
    <thead>
    <th>Title</th>
			<th>Message</th>
			<th>User Id</th>
			<th>Image</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($gcmMessages as $gcmMessage)
        <tr>
            <td>{!! $gcmMessage->title !!}</td>
			<td>{!! $gcmMessage->message !!}</td>
			<td>{!! $gcmMessage->user_id !!}</td>
			<td>{!! $gcmMessage->image !!}</td>
            <td>
                <a href="{!! route('gcmMessages.edit', [$gcmMessage->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('gcmMessages.delete', [$gcmMessage->id]) !!}" onclick="return confirm('Are you sure wants to delete this GcmMessage?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
