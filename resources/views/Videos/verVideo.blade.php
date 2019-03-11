@extends('Principal')
@section('title',"Ver video")

@section('content')


    <div class="container">

        <!-- Portfolio Item Heading -->
        <div class="w3-panel w3-border w3-round-large">
            <h1 class="my-4">{{ $video->nombre }}</h1>

            <!-- Portfolio Item Row -->
            <div class="row">
                <div class="col-md-8">
                    <video
                            id="my-player"
                            class="video-js"
                            controls
                            preload="auto"
                            poster="{{asset('/storage/portadas/'.$video->portada.".jpeg")}}"
                            data-setup='{}'>
                        <source src="{{asset ('storage/videos/'.$video->ubicacion)}}.mp4" type="video/mp4"></source>
                        <p class="vjs-no-js">
                            El navegador no es compatible con el reproductor :(
                        </p>
                    </video>
                </div>

                <div class="col-md-4">
                    <h2 class="my-3">Descripción</h2>
                    <p>{{$video->descripcion}}</p>
                    <h3 class="my-3">Genero</h3>
                    <label>{{$video->genero}}</label>
                </div>

            </div>
        </div>

        <!-- Related Projects Row -->
        <h3 class="my-4">Videos relacionados</h3>

        <div class="row">

            <div class="col-md-3 col-sm-6 mb-4">
                <a href="#">
                    <img class="img-fluid" src="http://placehold.it/500x300" height="150">
                </a>
                <label>titulo</label>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <a href="#">
                    <img class="img-fluid" src="http://placehold.it/500x300" height="150">
                </a>
                <label>Titulo</label>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <a href="#">
                    <img class="img-fluid" src="http://placehold.it/500x300" height="150">
                </a>
                <label>titulo</>
            </div>

            <div class="col-md-3 col-sm-6 mb-4">
                <a href="#">
                    <img class="img-fluid" src="http://placehold.it/500x300" height="150">
                </a>
                <label>titulo</label>
            </div>

        </div>
    </div>
        <!-- /.row -->

@endsection
