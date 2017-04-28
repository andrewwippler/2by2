<table class="table table-responsive" id="households-table">
    <thead>
        <th>Last Name</th>
        <th>People</th>
        <th>Plan To Visit</th>
        <th colspan="3"></th>
    </thead>
    <tbody>
    @foreach($households as $household)
        <tr>
            <td>{!! $household->last_name !!}</td>
            <td>{!! $household->people !!}</td>
            <td>{!! $household->plan_to_visit !!}</td>

            <td>
                {!! Form::open(['route' => ['households.destroy', $household->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('households.show', [$household->id]) !!}" class='btn btn-default'><i class="glyphicon glyphicon-eye-open"></i> View</a>
                    <a href="{!! route('households.edit', [$household->id]) !!}" class='btn btn-success'><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
