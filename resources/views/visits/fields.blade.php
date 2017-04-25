<!-- Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type', 'Type:') !!}

    <!-- Generating A Drop-Down List With Selected Default

    echo Form::select('size', array('L' => 'Large', 'S' => 'Small'), 'S'); -->

    {!! Form::select('type', $visit_type, null, ['class' => 'form-control']) !!}
</div>

<!-- Notes Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('notes', 'Notes:') !!}
    {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
</div>

<!-- Made Field -->
<div class="form-group col-sm-6">
    {!! Form::label('made', 'Made:') !!}
    {!! Form::date('made', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('visits.index') !!}" class="btn btn-default">Cancel</a>
</div>
