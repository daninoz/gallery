@extends('template')

@section('content')
<div class="container">
	<div class="page-header">
		<h2>Delete <small>{{ $gallery->name }}</small></h2>
	</div>
	{{ Form::open(array('method' => 'delete', "route" => ['galleries.destroy', $gallery->id])) }}
			<div class="alert alert-danger">
				Are you sure to delete this gallery?
			</div>
			{{ Form::submit('Yes', array('class' => 'btn btn-danger')) }}
			{{ Form::link('Cancel', route('galleries.index'), array( 'class' => "btn btn-info")) }}
	{{ Form::close() }}
</div>
@stop