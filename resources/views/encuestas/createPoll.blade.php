@extends('layout')



@section('content')

    <div class="row">
    <div class="col-md-2 "></div>
    <div class="col-md-6 ">

    <h2 class="mb-4 mt-5">Crear Encuesta</h2>

     <!-- genera un codigo solo si existe un error -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <h6>El campo nombre de la encuesta no puede quedar vacío</h6>
        {{--<ul>--}}
            {{--@foreach ($errors->all() as $error)--}}
                {{--<li>{{ $error }}</li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}
    </div>
    @endif



    
    <!-- formulario post-->

    <form method="POST" action="{{ url('/encuesta/createNewPoll') }}"> <!-- envia a la ruta /store-->
        <div class="form-group">
        {{ csrf_field() }} <!-- proteccion mediante token -->

        <!-- campo para pregunta (preguntai) -->

        <input type="text" class="form-control" name="titulo_encuesta" id="te" placeholder="Ingrese el nombre de la encuesta" value="{{ old('titulo_encuesta') }}">
        
        <br>
        <!-- boton para enviar formulario -->
        <button type="submit" class="btn btn-secondary mb-3" role="button" aria-pressed="true">Crear Encuesta</button>
        </div>
    </form>

    <!-- ruta para volver al inicio -->
    <a href="{{ route('encuestas.index') }}" class="btn btn-primary mb-3" role="button" aria-pressed="true">Volver al inicio<br></a>
    

    </div>
    <div class="col-md-3 "></div>
    </div>


    
@endsection