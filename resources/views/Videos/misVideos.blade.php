@extends('Principal')
@section('title',"Videos")

@section('content')
    <link rel="stylesheet" href="{{ asset('css/videos.css') }}">
    <section class="Videos">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="col-lg-12">
                        <h6 class="description">Mis Videos</h6>
                        @if ($videos->isEmpty())
                            <h2><strong>Al parecer no has subido ningun video aun. Intenta subir uno.</strong></h2>
                        @else
                            <div class="row">
                            @foreach($videos as $video)
                                    <div class="col-sm-6 col-md-4">
                                        <a href="../verVideo/{!!$video->id!!}" class="thumbnail">
                                            <img src="{{asset('storage/portadas/'.$video->portada.'.jpeg')}}" height="100" >
                                        </a>
                                        <div class="caption">
                                            <h2>{!!$video->nombre!!}</h2>
                                            <h3>{!!$video->genero!!}</h3>
                                            <p>{!!$video->descripcion!!}</p>
                                            <form action="{{route('video.edit', $video->id)}}" method="GET">
                                                <button type="submit" class="btn btn-info btn-lg" >Editar</button>
                                            </form>

                                        </div>
                                    </div>
                                @endforeach
                                    @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection