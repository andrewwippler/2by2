<!-- User Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('user_id', 'User:') !!}
    {!! $users[$profile->user_id-1] !!}
</div>

<!-- Sunday School Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sunday_school_id', 'Sunday School:') !!}
    {!! Form::select('sunday_school_id', $sunday_schools, null, ['class' => 'form-control']) !!}
</div>

<!-- Team Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('team_id', 'Team:') !!}
    {!! Form::select('team_id', $teams, null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-md-3 col-sm-6">
    {!! Form::label('default_city', 'Default City:') !!}
    {!! Form::text('default_city', null, ['class' => 'form-control']) !!}
</div>
<div class="clearfix visible-sm"></div>
<!-- State Field -->
<div class="form-group col-md-1 col-sm-6">
    {!! Form::label('default_state', 'Default State:') !!}
    {!! Form::text('default_state', null, ['class' => 'form-control']) !!}
</div>
<div class="clearfix visible-sm"></div>
<!-- Zip Field -->
<div class="form-group col-md-2 col-sm-6">
    {!! Form::label('default_zip', 'Default Zip:') !!}
    {!! Form::text('default_zip', null, ['class' => 'form-control']) !!}
</div>
<div class="clearfix hidden-xs"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('profiles.index') !!}" class="btn btn-default">Cancel</a>
</div>
