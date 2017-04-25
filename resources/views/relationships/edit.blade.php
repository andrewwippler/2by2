@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Relationship
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($relationship, ['route' => ['relationships.update', $relationship->id], 'method' => 'patch']) !!}

                        @include('relationships.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection