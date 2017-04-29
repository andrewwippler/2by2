<div class="row col-xs-12">
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
            <a href="mailto:{!! $person->phone_number !!}" class='btn btn-default btn-lg'><i class="fa fa-phone"></i></a>
            @endif
        </div>
    @endforeach
<!-- END PERSON -->
</div>
<div>
    <br>
    <b>Interested In:</b> {!! $household->interested_in !!}<br>
    <b>First Contacted:</b> {!! $household->first_contacted !!}<br>
    <b>Point Of Contact:</b> {!! $household->point_of_contact !!}<br>

    <!-- Address1 Field -->
    <div class='address'><b>Address:</b><br>
        {!! $household->address1 !!}<br>
        {!! $household->address2 !!}<br>
        {!! $household->city !!}, {!! $household->state !!} {!! $household->zip !!}<br>
    </div>
    <b>Family Notes:</b> {!! $household->family_notes !!}<br>

    <!-- Visits Field -->
    <a href="{{ url("/new-visit/$household->id") }}" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Add Visit</a>
    <table class="table table-responsive" id="households-table">
        <thead>
            <th>Type</th>
            <th>Notes</th>
            <th>Made</th>
            <th>&nbsp;</th>
        </thead>
        <tbody>
            @foreach ($visits as $visit)
                <td>{!! $visit_type[$visit->type] !!}</td>
                <td>{!! $visit->notes !!}</td>
                <td>{!! $visit->made !!}</td>
                <td></td>
            @endforeach
        </tbody>
    </table>
<div>
