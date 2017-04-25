@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Visit
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($visit, ['route' => ['visits.update', $visit->id], 'method' => 'patch']) !!}

                        @include('visits.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection