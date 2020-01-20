@extends('layout')



@section('content')


<div class="row">
    <div class="col-md-2 "></div>
    <div class="col-md-6 ">


    <h3 class="mt-5 mb-3">Editar Titulo Encuesta</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <h6>Por favor corrige los errores debajo:</h6>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



    <form method="POST" action="{{ url('encuesta/edit') }}">
    <div class="form-group">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        
        <input type="text" class="form-control" name="titulo_encuesta" id="pe" placeholder="Ingrese el nuevo titulo de la encuesta" value="{{ old('titulo_encuesta') }}">
        <br>
        
        <input id="t" name="titulo_id" type="hidden" value="{{ $titulo_id}}">

        
        <button type="submit" class="btn btn-secondary mb-3" role="button" aria-pressed="true">Actualizar titulo</button>
    </div>
    </form>

     <!-- ruta para volver al inicio -->
     <a href="{{ route('encuestas.index') }}" class="btn btn-primary mb-3" role="button" aria-pressed="true">Volver al inicio<br></a>
    

    </div>
    <div class="col-md-3 "></div>
    </div>

@endsection