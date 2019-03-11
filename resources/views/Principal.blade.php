<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title',"inicio") | lisTUBE</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap/css/bootstrap.css') }}">
    <link href="//vjs.zencdn.net/5.19/video-js.min.css" rel="stylesheet">
    <script src="//vjs.zencdn.net/5.19/video.min.js"></script>

</head>
<body>
    @include('componentes.navBar')
    <section>
        @yield('content')
    </section>
    <footer>
        @include('componentes.footer')
    </footer>
    <script src="{{asset('js/jquery-3.2.1.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://vjs.zencdn.net/6.4.0/video.js"></script>
    <script type="text/javascript" src="{{asset('js/progressBar.js')}}"></script>
</body>
</html>