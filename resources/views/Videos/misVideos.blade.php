@extends('Principal')
@section('title',"Videos")

@section('content')
    <link rel="stylesheet" href="{{ asset('css/videos.css') }}">
    <section class="team">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="col-lg-12">
                        <h6 class="description">Mis Videos</h6>
                        @if ($videos->isEmpty())
                            <p>No hay videos</p>
                        @else
                            @foreach($videos as $video)
                                <div class="row pt-md">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 profile">
                                        <div class="img-box">
                                            <img src="http://nabeel.co.in/files/bootsnipp/team/1.jpg" class="img-responsive" >
                                            <ul class="text-center">
                                                <a href="{{route ('video.verVideo')}}"><li><i class="fa fa-facebook"></i></li></a>
                                            </ul>
                                        </div>
                                        <h1>{!!$video->nombre!!}</h1>
                                        <h2>{!!$video->genero!!}</h2>
                                        <p>{!!$video->descripcion!!}</p>
                                    </div>@endforeach
                                </div>
                                @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="col-md-10 col-md-offset-1 text-center">

                <h6>Derechos Reservados <i class="fa fa-heart red"></i> by Miguel Acosta</h6>
            </div>
        </div>
    </footer>

@endsection