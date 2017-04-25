<table class="table table-responsive" id="households-table">
    <thead>
        <th>Last Name</th>
        <th>People</th>
        <th>Home Phone</th>
        <th>Department</th>
        <th>Connected</th>
        <th>Plan To Visit</th>
        <th>Interested In</th>
        <th>Family Notes</th>
        <th>First Contacted</th>
        <th>Point Of Contact</th>
        <th>Address1</th>
        <th>Address2</th>
        <th>City</th>
        <th>State</th>
        <th>Zip</th>
        <th>User</th>
        <th>Visits</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($households as $household)
        <tr>
            <td>{!! $household->last_name !!}</td>
            <td>{!! $household->people !!}</td>
            <td>{!! $household->home_phone !!}</td>
            <td>{!! $household->department !!}</td>
            <td>{!! $household->connected !!}</td>
            <td>{!! $household->plan_to_visit !!}</td>
            <td>{!! $household->interested_in !!}</td>
            <td>{!! $household->family_notes !!}</td>
            <td>{!! $household->first_contacted !!}</td>
            <td>{!! $household->point_of_contact !!}</td>
            <td>{!! $household->address1 !!}</td>
            <td>{!! $household->address2 !!}</td>
            <td>{!! $household->city !!}</td>
            <td>{!! $household->state !!}</td>
            <td>{!! $household->zip !!}</td>
            <td>{!! $household->user !!}</td>
            <td>{!! $household->visits !!}</td>
            <td>
                {!! Form::open(['route' => ['households.destroy', $household->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('households.show', [$household->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('households.edit', [$household->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>