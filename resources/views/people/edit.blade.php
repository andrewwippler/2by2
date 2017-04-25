@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Person
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($person, ['route' => ['people.update', $person->id], 'method' => 'patch']) !!}

                        @include('people.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection