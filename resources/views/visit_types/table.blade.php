<table class="table table-responsive" id="visitTypes-table">
    <thead>
        <th>Name</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($visitTypes as $visitType)
        <tr>
            <td>{!! $visitType->name !!}</td>
            <td>
                {!! Form::open(['route' => ['visitTypes.destroy', $visitType->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('visitTypes.show', [$visitType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('visitTypes.edit', [$visitType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>