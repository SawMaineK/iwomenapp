<table class="table">
    <thead>
    <th>Name</th>
			<th>Email</th>
			<th>Message</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($emails as $email)
        <tr>
            <td>{!! $email->name !!}</td>
			<td>{!! $email->email !!}</td>
			<td>{!! $email->message !!}</td>
            <td>
                <a href="{!! route('emails.edit', [$email->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('emails.delete', [$email->id]) !!}" onclick="return confirm('Are you sure wants to delete this Email?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
