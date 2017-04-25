@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Prospect Status
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($prospectStatus, ['route' => ['prospectStatuses.update', $prospectStatus->id], 'method' => 'patch']) !!}

                        @include('prospect_statuses.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection