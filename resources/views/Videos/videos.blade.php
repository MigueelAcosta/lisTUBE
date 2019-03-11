@extends('Principal')
@section('title',"Videos")

@section('content')
<link rel="stylesheet" href="{{ asset('css/videos.css') }}">
<section class="videos">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="col-lg-12">
                    <h6 class="description">Videos</h6>
                    @if ($videos->isEmpty())
                        <p>No se encontranron videos</p>
                    @else
                        <div class="row">
                        @foreach($videos->sortBy('nombre') as $video)
                                <div class="col-sm-6 col-md-4">
                                    <a href="../verVideo/{!!$video->id!!}" class="thumbnail">
                                        <img src="{{asset('/storage/portadas/'.$video->portada.".jpeg")}}" width="" >
                                    </a>
                                    <div class="caption">
                                        <h2>{!! $video->titulo !!}</h2>
                                        <h3>{!! $video->genero !!}</h3>
                                        <p>{!! $video->descripcion !!}</p>
                                    </div>
                                </div>
                        @endforeach
                        @endif
                            {!! $videos->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    @include('Videos.videosRecientes')


@endsection