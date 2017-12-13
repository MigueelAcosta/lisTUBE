<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
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
    <script src="{{asset('js/jquery-3.2.1.js')}}"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="http://vjs.zencdn.net/6.4.0/video.js"></script>
</body>
</html>