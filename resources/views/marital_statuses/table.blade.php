<table class="table table-responsive" id="maritalStatuses-table">
    <thead>
        <th>Name</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($maritalStatuses as $maritalStatus)
        <tr>
            <td>{!! $maritalStatus->name !!}</td>
            <td>
                {!! Form::open(['route' => ['maritalStatuses.destroy', $maritalStatus->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('maritalStatuses.show', [$maritalStatus->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('maritalStatuses.edit', [$maritalStatus->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>