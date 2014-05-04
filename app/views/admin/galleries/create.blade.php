@extends('template')

@section('content')
<div class="container">
    <div class="page-header">
        <h1>
            New Gallery
        </h1>
    </div>
    {{ Form::open(array('route' => 'galleries.store', 'method' => 'POST', 'files' => 'true')) }}
    <div class="row">
        <div class="form-group col-sm-4">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
            {{ Form::errors($errors->get('name')) }}
        </div>
    </div>
    <div class="row multi-columns-row">
        <div class="form-group col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <label>Images</label><br /><br />
            <a class="btn btn-success" id="add-image" >Add Image</a><br /><br />
            <a class="btn btn-info" data-toggle="modal" data-target=".bs-modal-lg" id="find-image">Find Image</a><br /><br />
        </div>
    </div>
    <div class="row multi-columns-row" id="images-to-upload">
    </div>
    <div class="row multi-columns-row" id="images-to-link">
    </div>
    <div class="row">
        <div class="form-group col-sm-8">
            {{ Form::link('Cancel', action('galleries.index'), array( 'class' => "btn btn-info")) }}
        </div>
        <div class="form-group col-sm-4 text-right">
            {{ Form::reset('Clean', array( 'class' => "btn btn-warning")) }}
            {{ Form::submit('Submit', array( 'class' => "btn btn-success")) }}
        </div>
    </div>
    {{ Form::close() }}
</div>
@include('galleries._partials.form_modal')
@stop

@include('galleries._partials.form_scripts');