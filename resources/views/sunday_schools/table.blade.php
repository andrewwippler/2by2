<table class="table table-responsive" id="sundaySchools-table">
    <thead>
        <th>Name</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($sundaySchools as $sundaySchool)
        <tr>
            <td>{!! $sundaySchool->name !!}</td>
            <td>
                {!! Form::open(['route' => ['sundaySchools.destroy', $sundaySchool->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('sundaySchools.show', [$sundaySchool->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('sundaySchools.edit', [$sundaySchool->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>