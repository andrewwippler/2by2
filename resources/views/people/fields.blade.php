<!-- First Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('first_name', 'First Name:') !!}
    {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Middle Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('middle_name', 'Middle Name:') !!}
    {!! Form::text('middle_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Lifestage Field -->
<div class="form-group col-sm-6">
    {!! Form::label('LifeStage', 'Lifestage:') !!}
    {!! Form::select('LifeStage', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Spiritual Condition Field -->
<div class="form-group col-sm-6">
    {!! Form::label('spiritual_condition', 'Spiritual Condition:') !!}
    {!! Form::select('spiritual_condition', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Prospect Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('prospect_status', 'Prospect Status:') !!}
    {!! Form::select('prospect_status', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Notes Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('notes', 'Notes:') !!}
    {!! Form::textarea('notes', null, ['class' => 'form-control']) !!}
</div>

<!-- Marital Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('marital_status', 'Marital Status:') !!}
    {!! Form::select('marital_status', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Relationship Field -->
<div class="form-group col-sm-6">
    {!! Form::label('relationship', 'Relationship:') !!}
    {!! Form::select('relationship', ], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('people.index') !!}" class="btn btn-default">Cancel</a>
</div>
