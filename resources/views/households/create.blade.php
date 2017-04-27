@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            New Prospect
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'households.store']) !!}
                         {{ csrf_field() }}
                    <!-- Last Name Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('last_name', 'Last Name:') !!}
                        {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
                    </div>

<!-- BEGIN PERSON -->
<div class="row col-lg-12 col-sm-6 person-group">
    <!-- First Name Field -->
    <div class="form-group col-lg-3 col-sm-6">
        {!! Form::label('first_name', 'First Name:') !!}
        {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Email Field -->
    <div class="form-group col-lg-3 col-sm-6">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Cell Field -->
    <div class="form-group col-lg-3 col-sm-6">
        {!! Form::label('phone_number', 'Cell Phone:') !!}
        {!! Form::tel('phone_number', null, ['class' => 'form-control']) !!}
    </div>
</div>
<!-- END PERSON -->
                    <!-- Department Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('department', 'Department:') !!}
                        {!! Form::select('department', $department, null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Family Notes Field -->
                    <div class="form-group col-sm-12 col-lg-12">
                        {!! Form::label('family_notes', 'Family Notes:') !!}
                        {!! Form::textarea('family_notes', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- First Contacted Field -->
                        {!! Form::hidden('first_contacted', $today) !!}


                    <!-- Address1 Field -->

                    <div class="form-group col-sm-6">
                        {!! Form::label('address1', 'Address1:') !!}
                        {!! Form::text('address1', null, ['class' => 'form-control']) !!}
                    </div>
                <div class="clearfix hidden-xs hidden-sm"></div>
                    <!-- Address2 Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('address2', 'Address2:') !!}
                        {!! Form::text('address2', null, ['class' => 'form-control']) !!}
                    </div>
                <div class="clearfix hidden-xs hidden-sm"></div>
                    <!-- City Field -->
                    <div class="form-group col-md-2 col-sm-6">
                        {!! Form::label('city', 'City:') !!}
                        {!! Form::text('city', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- State Field -->
                    <div class="form-group col-md-1 col-sm-6">
                        {!! Form::label('state', 'State:') !!}
                        {!! Form::text('state', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Zip Field -->
                    <div class="form-group col-md-2 col-sm-6">
                        {!! Form::label('zip', 'Zip:') !!}
                        {!! Form::text('zip', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- User Field -->
                        {!! Form::hidden('user', $user) !!}

                    <!-- Submit Field -->
                    <div class="form-group col-sm-12">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                        <a href="{!! route('households.index') !!}" class="btn btn-default">Cancel</a>
                    </div>


                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
