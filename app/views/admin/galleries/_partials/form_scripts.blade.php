@section('scripts')
    @parent
    <script type="text/javascript" src="{{ asset('assets/Bootstrap-3-Grid-Columns-Clearing/js/ie-row-fix.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/upload-images.js') }}"></script>
@stop

@section('styles')
    @parent
    <link href="{{ asset('assets/Bootstrap-3-Grid-Columns-Clearing/css/multi-columns-row.css') }}" rel="stylesheet">
@stop