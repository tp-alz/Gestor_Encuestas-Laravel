@extends('layout')



@section('content')
    <div class="row">
    <div class="col-md-2 "></div>
    <div class="col-md-6 ">

    <h3 class="mt-5 mb-3">Editar Titulo Pregunta</h3>

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



    <form method="POST" action="{{ url('encuesta/pregunta/edit') }}">
    <div class="form-group">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <p>
        </p>  
        <input type="text" class="form-control" name="pregunta_encuesta" id="pe" placeholder="Ingrese el nuevo nombre de la pregunta" value="{{ old('pregunta_encuesta') }}">
        <br>
        
        <input id="t" name="pregunta_id" type="hidden" value="{{ $pregunta_id}}">

        <button type="submit" class="btn btn-secondary mb-3" role="button" aria-pressed="true">Actualizar pregunta</button>
    </div>
    </form>

    <!-- ruta para volver al inicio -->
    <a href="{{ route('encuestas.index') }}" class="btn btn-primary mb-3" role="button" aria-pressed="true">Volver al inicio<br></a>
    

    </div>
    <div class="col-md-3 "></div>
    </div>

@endsection