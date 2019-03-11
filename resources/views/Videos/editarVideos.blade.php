@extends('Principal')

@section('title','Editar video')

@section('content')
    <div class="container">
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">{{session::get('success')}}</div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger" role="alert">Error al intentar modificar el video, por favor intentalo de nuevo.</div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="well well-sm">
                    <form class="form-horizontal" method="POST" action="{{route ('video.update',$video)}}">
                        {{ csrf_field() }}
                        {{method_field('PUT')}}
                        <fieldset>
                            <legend class="text-center header">Editar video</legend>
                            <div class="row">
                                <div align="center">
                                    <img src="{{asset('storage/portadas/'.$video->portada.'.jpeg')}}" height="150" align="center"><br>
                                </div>
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                                    <div class="col-md-8">
                                        <label for="">Titulo del video</label>
                                        <input id="titulo" name="titulo" type="text" placeholder="{{$video->nombre}}" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                                    <div class="col-md-8">
                                        <label for="">Genero</label>
                                        <input id='genero' name="genero" type="text" placeholder="{{$video->genero}}" class="form-control" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                                    <div class="col-md-8">
                                        <label for="">Descripción</label>
                                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="{{$video->descripcion}}" rows="7"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                                        <a href="/misVideos">Cancelar</a>
                                    </div>
                                </div>   
                            </div>

                            
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
