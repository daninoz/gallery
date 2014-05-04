@extends('template')

@section('content')
<div class="container">
    <div class="page-header">
        <h1>
            Galleries <a href="{{ route('galleries.create') }}" class="btn btn-success pull-right">Add Gallery</a>
        </h1>
    </div>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>Name</th>
            <th colspan="2" class="text-right">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($galleries as $gallery)
        <tr>
            <td class="vert-align">{{ $gallery->name }}</td>
            <td class="vert-align text-right">
                <a href="{{ route('galleries.edit', $gallery->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <a href="{{ route('galleries.delete', $gallery->id) }}" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr>
            <td colspan="3" class="text-right">
                {{ $galleries->links() }}
            </td>
        </tr>
        </tfoot>
    </table>
</div>
@stop