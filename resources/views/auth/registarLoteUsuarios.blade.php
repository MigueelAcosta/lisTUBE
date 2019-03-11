@extends('Principal')

@section('title','Registro de usuarios')

@section('content')
    <div class="container">
    <div class="col-md-8 col-md-offset-2">
        <h3>Registrar lote de usuarios</h3>
        <form method="POST" action="/validarxml" enctype="text/xml">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="input-group input-file" name="Fichier1">
                    <input type="file" class="form-control" placeholder='Escoge el documento xml' name="xml" id="xml" required accept="text/xml"/>
                    <span class="input-group-btn">
       			 <button class="btn btn-warning btn-reset" type="button" >
                     <a href="{{asset('xml/validar.xsd')}}" download="{{asset('xml/validar.xsd')}}">Descargar plantilla</a>
                 </button>
    		</span>
                </div>
            </div>
            <!-- COMPONENT END -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary pull-right" >Registrar</button>
            </div>
        </form>
    </div>
    </div>
@endsection
