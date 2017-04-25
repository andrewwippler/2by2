<table class="table table-responsive" id="visits-table">
    <thead>
        <th>Type</th>
        <th>Notes</th>
        <th>Made</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($visits as $visit)
        <tr>
            <td>{!! $visit_type[$visit->type] !!}</td>
            <td>{!! $visit->notes !!}</td>
            <td>{!! $visit->made !!}</td>
            <td>
                {!! Form::open(['route' => ['visits.destroy', $visit->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <!-- <a href="{!! route('visits.show', [$visit->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a> -->
                    <a href="{!! route('visits.edit', [$visit->id]) !!}" class='btn btn-success'><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
