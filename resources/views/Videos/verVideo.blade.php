@extends('Principal')
@section('title',"Ver video")

@section('content')
    <div class="col-md-offset-3">
        <H1><strong>Titulo del video</strong></H1>
    </div>
    <div class="col-md-6">
        <video
                id="my-player"
                class="video-js"
                controls
                preload="auto"
                poster="//vjs.zencdn.net/v/oceans.png"
                data-setup='{}'>
            <source src="videos/{!! $videos->nombre !!}" type="video/webm"></source>
            <p class="vjs-no-js">
                To view this video please enable JavaScript, and consider upgrading to a
                web browser that
                <a href="http://videojs.com/html5-video-support/" target="_blank">
                    supports HTML5 video
                </a>
            </p>
        </video>

    </div>
    <div class="col-md-6">
        <h3>genero</h3>
    </div>
    <div class="col-md-offset-6">
        <p>descripcion</p>
    </div>
@endsection