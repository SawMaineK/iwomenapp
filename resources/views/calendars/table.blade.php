<table class="table">
    <thead>
    <th>Objectid</th>
			<th>Title</th>
			<th>Title Mm</th>
			<th>Description</th>
			<th>Description Mm</th>
			<th>Location</th>
			<th>Location Mm</th>
			<th>Start Date</th>
			<th>End Date</th>
			<th>Start Time</th>
			<th>End Time</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($calendars as $calendar)
        <tr>
            <td>{!! $calendar->objectId !!}</td>
			<td>{!! $calendar->title !!}</td>
			<td>{!! $calendar->title_mm !!}</td>
			<td>{!! $calendar->description !!}</td>
			<td>{!! $calendar->description_mm !!}</td>
			<td>{!! $calendar->location !!}</td>
			<td>{!! $calendar->location_mm !!}</td>
			<td>{!! $calendar->start_date !!}</td>
			<td>{!! $calendar->end_date !!}</td>
			<td>{!! $calendar->start_time !!}</td>
			<td>{!! $calendar->end_time !!}</td>
            <td>
                <a href="{!! route('calendars.edit', [$calendar->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('calendars.delete', [$calendar->id]) !!}" onclick="return confirm('Are you sure wants to delete this Calendar?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
