@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            {!! $household->last_name !!}
        </h1>
        <h1 class="pull-right">
            <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('households.edit', [$household->id]) !!}"><i class="fa fa-pencil"></i> Edit</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12">
                    @include('households.show_fields')
                    </div>
                    <div class="col-xs-12" style="margin-top: 10px;">
                    <a href="{!! route('households.index') !!}" class="btn btn-default">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
