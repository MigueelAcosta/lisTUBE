@extends('Principal')

@section('title','Subir videos')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/subirVideos.css') }}" >
    <form class="form-horizontal" enctype="multipart/form-data" action="{{route ('video.store')}}" method="POST" >
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Información de video</h3>
            </div>
            <div class="form-group">
                <label for="Titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" class="form-control">
            </div>
            <div class="form-group">
                <label for="Genero">Genero: </label>
                <input type="text" id="genero" name="genero" class="form-control">
            </div>
            <div class="form-group">
                <label for="Descripción"> Descripción: </label>
                <textarea id="descripcion" name="descripcion" class="form-control"></textarea>
            </div>
        </div>
        <h3>Selecciona tu video</h3>
        <input name="video" type="file" class="form-control" />
        <input type="submit" value="Guardar" />
    </form>


    
@endsection