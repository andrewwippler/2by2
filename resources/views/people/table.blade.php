<table class="table table-responsive" id="people-table">
    <thead>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Phone Number</th>
        <th>Lifestage</th>
        <th>Email</th>
        <th>Spiritual Condition</th>
        <th>Prospect Status</th>
        <th>Notes</th>
        <th>Marital Status</th>
        <th>Relationship</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($people as $person)
        <tr>
            <td>{!! $person->first_name !!}</td>
            <td>{!! $person->middle_name !!}</td>
            <td>{!! $person->phone_number !!}</td>
            <td>{!! $person->LifeStage !!}</td>
            <td>{!! $person->email !!}</td>
            <td>{!! $person->spiritual_condition !!}</td>
            <td>{!! $person->prospect_status !!}</td>
            <td>{!! $person->notes !!}</td>
            <td>{!! $person->marital_status !!}</td>
            <td>{!! $person->relationship !!}</td>
            <td>
                {!! Form::open(['route' => ['people.destroy', $person->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('people.show', [$person->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('people.edit', [$person->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>