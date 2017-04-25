<table class="table table-responsive" id="prospectStatuses-table">
    <thead>
        <th>Name</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($prospectStatuses as $prospectStatus)
        <tr>
            <td>{!! $prospectStatus->name !!}</td>
            <td>
                {!! Form::open(['route' => ['prospectStatuses.destroy', $prospectStatus->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('prospectStatuses.show', [$prospectStatus->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('prospectStatuses.edit', [$prospectStatus->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>