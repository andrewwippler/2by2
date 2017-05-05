@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Prospect Household
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($household, ['route' => ['households.update', $household->id], 'method' => 'patch']) !!}

                        @include('households.fields')

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
