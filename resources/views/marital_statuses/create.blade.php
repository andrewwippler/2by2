@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Marital Status
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'maritalStatuses.store']) !!}

                        @include('marital_statuses.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
