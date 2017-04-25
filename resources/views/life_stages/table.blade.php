<table class="table table-responsive" id="lifeStages-table">
    <thead>
        <th>Name</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($lifeStages as $lifeStage)
        <tr>
            <td>{!! $lifeStage->name !!}</td>
            <td>
                {!! Form::open(['route' => ['lifeStages.destroy', $lifeStage->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('lifeStages.show', [$lifeStage->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('lifeStages.edit', [$lifeStage->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>