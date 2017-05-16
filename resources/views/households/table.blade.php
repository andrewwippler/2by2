<div class="box-body no-padding">
  <table class="table table-striped" id="households-table">
    <thead>
        <th>First Names<br>
            Last Name</th>
        <th>Plan To Visit</th>
        <th> </th>
    </thead>
    <tbody>
    @foreach($households as $household)
        <tr>
            <td>{!! $people[$household->id] !!}<br>
                {!! $household->last_name !!}</td>
            <td>{!! $household->plan_to_visit !!}</td>

            <td class="hidden-xs">
                {!! Form::open(['route' => ['households.destroy', $household->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('households.show', [$household->id]) !!}" class='btn btn-default btn-sm'><i class="glyphicon glyphicon-eye-open"></i> View</a>
                    <a href="{!! route('households.edit', [$household->id]) !!}" class='btn btn-success btn-sm'><i class="glyphicon glyphicon-edit"></i> Edit</a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>

            <td class="hidden-sm hidden-md hidden-lg">
                {!! Form::open(['route' => ['households.destroy', $household->id], 'method' => 'delete']) !!}
                <div class='btn-group-vertical'>
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
</div>
