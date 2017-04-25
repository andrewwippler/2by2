<table class="table table-responsive" id="relationships-table">
    <thead>
        <th>Name</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($relationships as $relationship)
        <tr>
            <td>{!! $relationship->name !!}</td>
            <td>
                {!! Form::open(['route' => ['relationships.destroy', $relationship->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('relationships.show', [$relationship->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('relationships.edit', [$relationship->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>