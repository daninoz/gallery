@extends('template')

@section('content')
<div class="container">
    <div class="page-header">
        {{ Form::open(array('method' => 'GET')) }}
        <div class="row">
            <div class="col-sm-9">
                <h1>
                    Edit Gallery
                </h1>
            </div>
        </div>
        {{ Form::close() }}
    </div>
    {{ Form::open(array('route' => ['galleries.update', $gallery->id], 'method' => 'PUT')) }}
    <div class="row">
        <div class="form-group col-sm-4">
            {{ Form::label('name', 'Name') }}
            {{ Form::text('name', Input::old('name', $gallery->name), array('class' => 'form-control')) }}
            {{ Form::errors($errors->get('name')) }}
        </div>
    </div>
    <div class="row">
        <div class="form-group col-sm-3">
            <label>Images</label><br /><br />
            <a class="btn btn-success" id="add-image" >Add Image</a><br /><br />
            <a class="btn btn-info" data-toggle="modal" data-target=".bs-modal-lg" id="find-image">Find Image</a><br /><br />
        </div>
        @foreach ($gallery->images as $image)
            <div class="form-group col-sm-3">
                <img src="{{ asset('/uploads/image/'.$image->filename) }}" class="img-responsive"></img><br />
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="images-to-delink[{{ $image->id }}]" />Remove
                    </label>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row multi-columns-row" id="images-to-upload">
    </div>
    <div class="row multi-columns-row" id="images-to-link">
    </div>
    <div class="row">
        <div class="form-group col-sm-8">
            {{ Form::link('Cancel', route('galleries.index'), array( 'class' => "btn btn-info")) }}
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