@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sunday School
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($sundaySchool, ['route' => ['sundaySchools.update', $sundaySchool->id], 'method' => 'patch']) !!}

                        @include('sunday_schools.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection