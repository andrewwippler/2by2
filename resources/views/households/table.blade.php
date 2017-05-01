<table class="table table-responsive" id="households-table">
    <thead>
        <th>First Names</th>
        <th>Last Name</th>
        <th>Plan To Visit</th>
        <th colspan="3"></th>
    </thead>
    <tbody>
    @foreach($households as $household)
        <tr>
            <td>@if (count($household['relations']['people']) < 2)
                    {!! $household['relations']['people'][0]->first_name !!}
                @else
                     @foreach ($household['relations']['people'] as $person)
                         {!! $person->first_name !!},
                     @endforeach
                @endif
            </td>
            <td>{!! $household->last_name !!}</td>
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
