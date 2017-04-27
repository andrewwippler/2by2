{{ csrf_field() }}

<!-- Last Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('last_name', 'Last Name:') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Home Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('home_phone', 'Home Phone:') !!}
    {!! Form::text('home_phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Department Field -->
<div class="form-group col-sm-6">
    {!! Form::label('department', 'Department:') !!}
    {!! Form::select('department', $department, null, ['class' => 'form-control']) !!}
</div>

<!-- Connected Field -->
<div class="form-group checkbox col-sm-6">
    <label class="checkbox">
        {!! Form::hidden('connected', false) !!}
        {!! Form::checkbox('connected', null, null) !!} Connected
    </label>
</div>

<!-- Plan To Visit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('plan_to_visit', 'Plan To Visit:') !!}
    {!! Form::date('plan_to_visit', null, ['class' => 'form-control']) !!}
</div>

<!-- Interested In Field -->
<div class="form-group col-sm-6">
    {!! Form::label('interested_in', 'Interested In:') !!}
    {!! Form::text('interested_in', null, ['class' => 'form-control']) !!}
</div>

<!-- Family Notes Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('family_notes', 'Family Notes:') !!}
    {!! Form::textarea('family_notes', null, ['class' => 'form-control']) !!}
</div>

<!-- First Contacted Field -->
<div class="form-group col-sm-6">
    {!! Form::label('first_contacted', 'First Contacted:') !!}
    {!! Form::date('first_contacted', null, ['class' => 'form-control']) !!}
</div>

<!-- Point Of Contact Field -->
<div class="form-group col-sm-6">
    {!! Form::label('point_of_contact', 'Point Of Contact:') !!}
    {!! Form::text('point_of_contact', null, ['class' => 'form-control']) !!}
</div>

<!-- Address1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address1', 'Address1:') !!}
    {!! Form::text('address1', null, ['class' => 'form-control']) !!}
</div>

<!-- Address2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address2', 'Address2:') !!}
    {!! Form::text('address2', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', 'City:') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- State Field -->
<div class="form-group col-sm-6">
    {!! Form::label('state', 'State:') !!}
    {!! Form::text('state', null, ['class' => 'form-control']) !!}
</div>

<!-- Zip Field -->
<div class="form-group col-sm-6">
    {!! Form::label('zip', 'Zip:') !!}
    {!! Form::text('zip', null, ['class' => 'form-control']) !!}
</div>

<!-- User Field -->
    {!! Form::hidden('user', $user) !!}

<!-- Visits Field -->
<div class="form-group col-sm-6">
    {!! Form::label('visits', 'Visits:') !!}
    {!! Form::text('visits', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('households.index') !!}" class="btn btn-default">Cancel</a>
</div>
