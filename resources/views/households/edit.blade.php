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


@endsection
