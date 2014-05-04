<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Galleries</title>
    @include('_partials.styles')
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}">
</head>
<body>
<div id="wrap">
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="">Galleries</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{ route('galleries.index') }}">Galleries</a></li>
                </ul>
            </div>
        </div>
    </div>
    @yield('content')
</div>
<div id="footer">
    <div class="container">
        <p class="mutted-text text-right">daninoz</p>
    </div>
</div>
@include('_partials.scripts')
</body>
</html>