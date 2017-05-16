
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
    @if ($household->address1 && $household->zip) <address><b>Address:</b><br>
        {!! $household->address1 !!}<br>
        @if ($household->address2) {!! $household->address2 !!}<br> @endif
        {!! $household->city !!}, {!! $household->state !!} {!! $household->zip !!}<br>
    </address>
    <a href="https://www.google.com/maps/place/{!! $household->address1 !!}{!! $household->address2 !!},{!! $household->city !!},{!! $household->state !!} {!! $household->zip !!}" class="btn btn-large btn-info"><i class="fa fa-map"></i> View On Map</a>
    @endif
    @if ($household->family_notes) <p><b>Family Notes:</b> {!! $household->family_notes !!}</p> @endif

<h2>Visits</h2>
    <!-- Visits Field -->
    <p><a href="{{ url("/new-visit/$household->id") }}" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Add Visit</a></p>
<div class="row">
    <div class="col-md-12">
        <ul class="timeline">
            <li class="time-label">
                  <span class="bg-yellow">
                    History
                  </span>
            </li>
            @foreach ($visits as $visit)
            <li>

                {{-- TODO: switch statement --}}
                <i class="fa fa-envelope bg-blue"></i>

                      <div class="timeline-item">
                        <span class="time"><i class="fa fa-clock-o"></i> {!! $visit->made !!}</span>

                        <h3 class="timeline-header">{!! $visit_type[$visit->type] !!}</h3>

                        <div class="timeline-body">
                          {!! $visit->notes !!}
                        </div>
                        <div class="timeline-footer">
                            {!! Form::open(['route' => ['visits.destroy', $visit->id], 'method' => 'delete']) !!}
                                <div class='btn-group'>
                                    <a href="{!! route('visits.edit', [$visit->id]) !!}" class='btn btn-success'><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i> Delete', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                </div>
                                {!! Form::close() !!}
                        </div>
                      </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>
