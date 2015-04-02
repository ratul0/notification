@extends('layouts.default')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('includes.alert')
            <section class="panel">
                <header class="panel-heading">
                    {{ $title }}
                    <span class="pull-right">

                            <a class="btn btn-success btn-sm" href="{{ URL::route('application.index') }}"><span class="fa fa-chevron-left"></span> Applications</a>

					</span>
                </header>
                <div class="panel-body">
                    {{ Form::open(array('route' => 'application.create', 'class' => 'form-horizontal')) }}




                    <div class="form-group">
                        {{ Form::label('name', 'Application Name*', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'Application Name')) }}
                        </div>
                    </div>

                    <div class="form-group">
                        {{ Form::label('url', 'Application URL', array('class' => 'col-md-2 control-label')) }}
                        <div class="col-md-4">
                            {{ Form::url('url', '', array('class' => 'form-control', 'placeholder' => 'Application URL')) }}
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            {{ Form::submit('Create Application', array('class' => 'btn btn-primary')) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </section>
        </div>
    </div>
@stop