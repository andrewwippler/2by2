
<h2>People</h2>
<!-- BEGIN PERSON -->
    @foreach ($people as $person)
        <div class="col-sm-4">
            <b><a href="{{ url("/people/$person->id/edit") }}">{!! $person->first_name !!} {!! $household->last_name !!}</a> @if ($person->relationship)
            - {!! $relationship[$person->relationship] !!}
        @endif </b><br>
            @if ($person->email)
            <a href="mailto:{!! $person->email !!}" class='btn btn-default btn-lg'><i class="fa fa-envelope"></i></a>
            @endif
            @if ($person->phone_number)
            <a href="{!! phone($person->phone_number, 'US', 3) !!}" class='btn btn-default btn-lg'><i class="fa fa-phone"></i></a>
            @endif
        </div>
    @endforeach
<!-- END PERSON -->
<div class="clearfix"></div>
<h2>Household information</h2>
    @if ($household->interested_in) <p><b>Interested In:</b> {!! $household->interested_in !!}</p> @endif
    <p><b>First Contacted:</b> {!! $household->first_contacted !!}</p>
    @if ($household->point_of_contact) <p><b>Point Of Contact:</b> {!! $household->point_of_contact !!}</p> @endif

    <!-- Address1 Field -->
    @if ($household->address1 && $household->zip) <div class='address'><b>Address:</b><br>
        {!! $household->address1 !!}<br>
        @if ($household->address2) {!! $household->address2 !!}<br> @endif
        {!! $household->city !!}, {!! $household->state !!} {!! $household->zip !!}<br>
    </div> @endif
    @if ($household->family_notes) <p><b>Family Notes:</b> {!! $household->family_notes !!}</p> @endif

<h2>Visits</h2>
    <!-- Visits Field -->
    <p><a href="{{ url("/new-visit/$household->id") }}" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Add Visit</a></p>

    <div class="table-responsive">
        <table class="table table-hover" id="households-table">
            <thead>
                <th>Visit Type</th>
                <th>Occurred On</th>
                <th>Notes</th>
                <th>&nbsp;</th>
            </thead>
            <tbody>
                @foreach ($visits as $visit)
                    <tr>
                        <td>{!! $visit_type[$visit->type] !!}</td>
                        <td>{!! $visit->made !!}</td>
                        <td>{!! $visit->notes !!}</td>
                        <td>{!! Form::open(['route' => ['visits.destroy', $visit->id], 'method' => 'delete']) !!}
                            <div class='btn-group'>
                                <a href="{!! route('visits.edit', [$visit->id]) !!}" class='btn btn-success'><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                            </div>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
