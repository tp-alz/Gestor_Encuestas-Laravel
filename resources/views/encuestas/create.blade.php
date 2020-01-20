@extends('layout')



@section('content')



    


    <div class="row">
    <div class="col-md-2 "></div>
    <div class="col-md-6 ">

    <h3 class="mt-5 mb-3">Crear Pregunta</h3>

     <!-- genera un codigo solo si existe un error -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <h6>Asegurate de llenar correctamente todos los campos</h6>
        {{--<ul>--}}
            {{--@foreach ($errors->all() as $error)--}}
                {{--<li>{{ $error }}</li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}
    </div>
    @endif



    
    <!-- formulario post-->

    <form method="POST" action="{{ url('/store') }}"> <!-- envia a la ruta /store-->
        <div class="form-group">
        {{ csrf_field() }} <!-- proteccion mediante token -->

        <!-- campo para pregunta (preguntai) -->
        
        <input type="text"  class="form-control" name="preguntai" id="p" placeholder="Ingrese su pregunta" value="{{ old('name') }}">
        
        <br>

        <!-- radio button controlan pregunta abierta o cerrada (radiob) -->
        <label for="pregunta_tipo">Seleccione el tipo de pregunta</label><br>
        <input type="radio" name="radiob" value="open" checked> Pregunta Abierta <br>
        <input type="radio" name="radiob" value="closed"> Pregunta Cerrada <br>
        <br>
        
        <!-- campo oculto para enviar el id de encuesta -->
        <input id="q" name="hidId" type="hidden" value="{{ $id_titulo }}">

        <!-- boton para enviar formulario -->
        <button type="submit" class="btn btn-secondary mb-3" role="button" aria-pressed="true">Crear pregunta</button>
        </div>
    </form>

    <!-- ruta para volver al inicio -->
    <a href="{{ route('encuestas.index') }}" class="btn btn-primary mb-3" role="button" aria-pressed="true">Volver al inicio<br></a>
    

    </div>
    <div class="col-md-3 "></div>
    </div>


    
@endsection