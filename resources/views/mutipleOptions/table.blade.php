<div class="table-responsive">
    <table id="data-table-command" class="table table-striped table-vmiddle">
        <thead>
                <th data-column-id="id" data-visible="false">Id</th>
                <th data-column-id="multiplequestionid">Mutiple Question Id</th>
    			<th data-column-id="option">Option</th>
    			<th data-column-id="optionmm">Option Mm</th>
                <th data-column-id="commands" data-formatter="commands" data-sortable="false">Action</th>
        </thead>
        <tbody>
        @foreach($mutipleOptions as $mutipleOption)
            <tr>
                <td>{!! $mutipleOption->id !!}</td>
                <td>{!! $mutipleOption->mutiple_question_id !!}</td>
    			<td>{!! $mutipleOption->option !!}</td>
    			<td>{!! $mutipleOption->option_mm !!}</td>
                <td>
                    <a href="{!! route('mutipleOptions.edit', [$mutipleOption->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="{!! route('mutipleOptions.delete', [$mutipleOption->id]) !!}" onclick="return confirm('Are you sure wants to delete this MutipleOption?')"><i class="glyphicon glyphicon-remove"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
