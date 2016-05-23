<table class="table">
    <thead>
    <th>Point</th>
			<th>Price</th>
    <th width="50px">Action</th>
    </thead>
    <tbody>
    @foreach($pointPrices as $pointPrice)
        <tr>
            <td>{!! $pointPrice->point !!}</td>
			<td>{!! $pointPrice->price !!}</td>
            <td>
                <a href="{!! route('pointPrices.edit', [$pointPrice->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="{!! route('pointPrices.delete', [$pointPrice->id]) !!}" onclick="return confirm('Are you sure wants to delete this PointPrice?')"><i class="glyphicon glyphicon-remove"></i></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
