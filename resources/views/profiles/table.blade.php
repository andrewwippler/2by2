<table class="table table-responsive" id="profiles-table">
    <thead>
        <th>User</th>
        <th>Team</th>
        <th>Sunday School</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($profiles as $profile)
        <tr>
            {{-- have to minus 1 because user_id starts at 0 and not 1 --}}
            <td>{!! $users[$profile->user_id-1] !!}</td>
            <td>{!! $teams[$profile->team_id] !!}</td>
            <td>{!! $sunday_schools[$profile->sunday_school_id] !!}</td>
            <td>
                {!! Form::open(['route' => ['profiles.destroy', $profile->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('profiles.edit', [$profile->user_id]) !!}" class='btn btn-success btn-lg'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-lg', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
