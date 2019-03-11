@extends('Principal')

@section('title','Subir videos')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/subirVideos.css') }}" >
    <form id="uploadForm" class="form-vertical" enctype="multipart/form-data" action="{{route ('video.store')}}" method="POST" >
        {{ csrf_field() }}
        <div class="container">
            <div class="panel-heading">
                <h1 class="panel-title"> <strong>Información de video</strong></h1>
            </div>
            @if(session()->has('success'))
                <div class="alert alert-success" role="alert">{{session('success')}}</div>
            @elseif(session()->has('error'))
                <div class="alert alert-danger" role="alert">Error al intentar guardar el video, por favor intentalo de nuevo.</div>
            @endif
            <div class="form-group">
                <label for="Titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Genero">Genero: </label>
                <input type="text" id="genero" name="genero" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="Descripción"> Descripción: </label>
                <textarea id="descripcion" name="descripcion" class="form-control" required maxlength="180"></textarea>
            </div>
            <h3>Selecciona tu video</h3>
            <input name="video" type="file" class="form-control" accept="video/*" id="video" required/>
            <input type="submit" value="Guardar" id="submit"/>
            <button class="btn btn-warning" id="cancelar" value="cancelar"> cancelar </button>
        </div>

    </form>
    <div class="container" id="progress-bar">
        <h3> Progreso</h3>
        <progress value="0" max="100" id="progressBar"> 0%</progress>
    </div>

@endsection