@extends('Principal')

@section('title','Subir videos')

@section('content')
    <h1>Sube tu video</h1>
    <form enctype="multipart/form-data" action="video" method="POST">
        <input name="video" type="file" />
        <input type="submit" value="Enviar fichero" />
    </form>
@endsection