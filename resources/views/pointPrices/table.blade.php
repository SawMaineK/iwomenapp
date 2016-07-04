<div class="table-responsive">
    <table id="data-table-command" class="table table-striped table-vmiddle">
        <thead>
            <th data-column-id="id" data-visible="false">Id</th>
            <th data-column-id="Point">Point</th>
            <th data-column-id="Price">Price</th>
    		<th data-column-id="PriceMM">Price MM</th>
            <th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
        </thead>
        <tbody>
        @foreach($pointPrices as $pointPrice)
            <tr>
                <td>{!! $pointPrice->id !!}</td>
                <td>{!! $pointPrice->point !!}</td>
                <td>{!! $pointPrice->price !!}</td>
    			<td>{!! $pointPrice->price_mm !!}</td>
                <td>
                    <a href="{!! route('pointPrices.edit', [$pointPrice->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="{!! route('pointPrices.delete', [$pointPrice->id]) !!}" onclick="return confirm('Are you sure wants to delete this PointPrice?')"><i class="glyphicon glyphicon-remove"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
