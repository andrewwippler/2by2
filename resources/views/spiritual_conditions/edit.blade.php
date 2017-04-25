@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Spiritual Condition
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($spiritualCondition, ['route' => ['spiritualConditions.update', $spiritualCondition->id], 'method' => 'patch']) !!}

                        @include('spiritual_conditions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection