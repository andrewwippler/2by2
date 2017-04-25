<!-- People Field -->
<div class="form-group">
    {!! Form::label('people', 'People:') !!}
    <p>{!! $household->people !!}</p>
</div>

<!-- Last Name Field -->
<div class="form-group">
    {!! Form::label('last_name', 'Last Name:') !!}
    <p>{!! $household->last_name !!}</p>
</div>

<!-- Home Phone Field -->
<div class="form-group">
    {!! Form::label('home_phone', 'Home Phone:') !!}
    <p>{!! $household->home_phone !!}</p>
</div>

<!-- Interested In Field -->
<div class="form-group">
    {!! Form::label('interested_in', 'Interested In:') !!}
    <p>{!! $household->interested_in !!}</p>
</div>

<!-- First Contacted Field -->
<div class="form-group">
    {!! Form::label('first_contacted', 'First Contacted:') !!}
    <p>{!! $household->first_contacted !!}</p>
</div>

<!-- Point Of Contact Field -->
<div class="form-group">
    {!! Form::label('point_of_contact', 'Point Of Contact:') !!}
    <p>{!! $household->point_of_contact !!}</p>
</div>

<!-- Address1 Field -->
<div class="form-group">
    {!! Form::label('address1', 'Address:') !!}
    <p>{!! $household->address1 !!}</p>
    <p>{!! $household->address2 !!}</p>
    <p>{!! $household->city !!}, {!! $household->state !!} {!! $household->zip !!}</p>
</div>

<!-- Family Notes Field -->
<div class="form-group">
    {!! Form::label('family_notes', 'Family Notes:') !!}
    <p>{!! $household->family_notes !!}</p>
</div>

<!-- Visits Field -->
<div class="form-group">
    {!! Form::label('visits', 'Visits:') !!}
    <p>{!! $household->visits !!}</p>
</div>
