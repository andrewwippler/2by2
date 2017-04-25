<table class="table table-responsive" id="spiritualConditions-table">
    <thead>
        <th>Name</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($spiritualConditions as $spiritualCondition)
        <tr>
            <td>{!! $spiritualCondition->name !!}</td>
            <td>
                {!! Form::open(['route' => ['spiritualConditions.destroy', $spiritualCondition->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('spiritualConditions.show', [$spiritualCondition->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('spiritualConditions.edit', [$spiritualCondition->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>