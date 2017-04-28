<div class="row col-xs-12">
<!-- BEGIN PERSON -->
    @foreach ($people as $person)
        <div class="col-sm-4">
            <h3>{!! $person->first_name !!} {!! $household->last_name !!} @if ($person->relationship)
            - {!! $relationship[$person->relationship] !!}
        @endif </h3><br>
            @if ($person->email)
            <a href="mailto:{!! $person->email !!}" class='btn btn-default btn-lg'><i class="fa fa-envelope"></i></a>
            @endif
            @if ($person->phone_number)
            <a href="mailto:{!! $person->phone_number !!}" class='btn btn-default btn-lg'><i class="fa fa-phone"></i></a>
            @endif

            <br><a href="{{ url("/people/$person->id/edit") }}" class="btn btn-default btn-lg"><i class="fa fa-pencil"></i> Edit Person</a><br>
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
    <a href="" class="btn btn-lg btn-success"><i class="fa fa-plus"></i> Add Visit</a>
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
