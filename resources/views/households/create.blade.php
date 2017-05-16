@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            New Prospect
        </h1>
    </section>
    <div class="content">
        @include('flash::message')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'households.store']) !!}
                         {{ csrf_field() }}
                     <!-- Department Field -->
                     <div class="form-group col-sm-6">
                         {!! Form::label('department', 'Department:') !!}
                         {!! Form::select('department', $department, null, ['class' => 'form-control']) !!}
                     </div>
                 <div class="clearfix hidden-xs"></div>
                    <!-- Last Name Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('last_name', 'Last Name:') !!} <span class="text-danger small">required</span>
                        {!! Form::text('last_name', null, ['class' => 'form-control', 'required']) !!}
                    </div>

<!-- BEGIN PERSON -->
<div class="person-group-wrapper">
<div class="row col-sm-12 person-group">
    <!-- First Name Field -->
    <div class="form-group col-sm-3 col-xs-12">
        {!! Form::label('first_name[]', 'First Name:') !!} <span class="text-danger small">required</span>
        {!! Form::text('first_name[]', null, ['class' => 'form-control', 'required']) !!}
    </div>

    <!-- Email Field -->
    <div class="form-group col-sm-3 col-xs-12">
        {!! Form::label('email[]', 'Email:') !!}
        {!! Form::email('email[]', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Cell Field -->
    <div class="form-group col-sm-3 col-xs-12">
        {!! Form::label('phone_number[]', 'Cell Phone:') !!}
        {!! Form::tel('phone_number[]', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Relationship Field -->
    <div class="form-group col-sm-2 col-xs-12">
        {!! Form::label('relationship[]', 'Relationship:') !!}
        {!! Form::select('relationship[]', $relationship, null, ['class' => 'form-control']) !!}
    </div>

    <!-- +/- -->
    <div class="form-group col-sm-1 col-xs-12">
        <br>
        <a href="javascript:void(0);" class="btn btn-success add_button"><i class="fa fa-plus"></i></a>
    </div>
</div>
</div>
<!-- END PERSON -->
<div class="clearfix visible-xs"></div>
                    <!-- Family Notes Field -->
                    <div class="form-group col-sm-12 col-lg-12">
                        {!! Form::label('family_notes', 'Family Notes:') !!}
                        {!! Form::textarea('family_notes', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Address1 Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('address1', 'Address1:') !!}
                        {!! Form::text('address1', null, ['class' => 'form-control']) !!}
                    </div>
                <div class="clearfix hidden-xs"></div>
                    <!-- Address2 Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('address2', 'Address2:') !!}
                        {!! Form::text('address2', null, ['class' => 'form-control']) !!}
                    </div>
                <div class="clearfix hidden-xs"></div>
                    <!-- City Field -->
                    <div class="form-group col-md-3 col-sm-6">
                        {!! Form::label('city', 'City:') !!}
                        {!! Form::text('city', $profile->default_city, ['class' => 'form-control']) !!}
                    </div>
<div class="clearfix visible-sm"></div>
                    <!-- State Field -->
                    <div class="form-group col-md-1 col-sm-6">
                        {!! Form::label('state', 'State:') !!}
                        {!! Form::text('state', $profile->default_state, ['class' => 'form-control']) !!}
                    </div>
<div class="clearfix visible-sm"></div>
                    <!-- Zip Field -->
                    <div class="form-group col-md-2 col-sm-6">
                        {!! Form::label('zip', 'Zip:') !!}
                        {!! Form::text('zip', $profile->default_zip, ['class' => 'form-control']) !!}
                    </div>
<div class="clearfix hidden-xs"></div>
                    <!-- User Field -->
                        {!! Form::hidden('user', $user) !!}

                        <!-- First Contacted Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('first_contacted', 'First Contacted:') !!}
                            {!! Form::input('date', 'first_contacted', date("Y-m-d"), ['class' => 'form-control']) !!}
                        </div>

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
<div class="hidden-sm hidden-lg hidden-xs hidden-md">
    <div class="person-group-copy">
        <!-- First Name Field -->
        <div class="form-group col-sm-3 col-xs-12">
            {!! Form::label('first_name[]', 'First Name:') !!}
            {!! Form::text('first_name[]', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Email Field -->
        <div class="form-group col-sm-3 col-xs-12">
            {!! Form::label('email[]', 'Email:') !!}
            {!! Form::email('email[]', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Cell Field -->
        <div class="form-group col-sm-3 col-xs-12">
            {!! Form::label('phone_number[]', 'Cell Phone:') !!}
            {!! Form::tel('phone_number[]', null, ['class' => 'form-control']) !!}
        </div>

        <!-- Relationship Field -->
        <div class="form-group col-sm-2 col-xs-12">
            {!! Form::label('relationship[]', 'Relationship:') !!}
            {!! Form::select('relationship[]', $relationship, null, ['class' => 'form-control']) !!}
        </div>

        <!-- +/- -->
        <div class="form-group col-sm-1 col-xs-12">
            <br>
            <a href="javascript:void(0);" class="btn btn-danger remove_button btn-sm"><i class="fa fa-minus"></i></a>
            <a href="javascript:void(0);" class="btn btn-success add_button btn-sm"><i class="fa fa-plus"></i></a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.person-group-wrapper'); //Input field wrapper

    $(wrapper).on('click', '.add_button', function(e){
        $('.hidden-md .person-group-copy').clone().appendTo(wrapper);
    });
    $(wrapper).on('click', '.remove_button', function(e){
        $(this).parent('div').parent('div').remove();
    });
});
</script>
@endsection
