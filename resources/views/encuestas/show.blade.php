@extends('layout')


@section('content')
    
    

    
    <div class="row">


    <div class="col-md-2  ">

    </div>



    <div class="col-md-8 ">




    <h2 class="mt-4 mb-3">{{ $titulo }}</h2>
        <form>
        <div class="form-group">
        @forelse ($pregunta as $preg) <!-- imprime todas las preguntas de una encuesta con un for -->
            
                
                <h4>{{ $preg->pregunta_encuesta }} </h4>
                 <!-- imprime la pregunta -->

                
                @if ($preg->tipo_id == 2 )<!-- control abierta o cerrada -->
                
                
                    @forelse ($opciones as $op)
                        @if( $op->pregunta_id == $preg->id)
                    
                            <input type="radio" name="radiob{{$preg->id}}" disabled="true" class="mb-3"> <!-- agrega boton de radio-->
                            {{ $op->opcion_encuesta}} <!-- agrega pregunta cerrada-->
                             <br>

                        @endif
                    @empty
                        <div class="alert alert-danger">
                        <h6>Recuerda agregar opciones a las preguntas cerradas</h6>
                        </div>
                    @endforelse

                    <a href="{{ route('encuestas.option', ['id' => $preg->id]) }}" class="btn btn-secondary mb-3" role="button" aria-pressed="true">Agregar Opcion</a> <!-- ruta agregar opciones-->
                    
    
                @else
                
                <input type="text" class="form-control"  name="text{{$preg->id}}" disabled="true"> <!-- agrega campo de texto-->
                @endif


            
            <br>


            <div class="row">


            <div class="col-md-3  ">
            
            <a href="{{ route('encuestas.edit', ['id' => $preg->id]) }}" class="btn btn-secondary mb-3" role="button" aria-pressed="true">Editar Pregunta<br></a>
    

            </div>

            <div class="col-md-3 ">
            
            <form method="POST" action="{{ url('encuesta/destroy') }}" > <!-- boton eliminar pregunta-->
                <div class="form-group">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    
                    <input id="t1" name="tipo_id" type="hidden" value="{{ $preg->tipo_id }}">
                    <input id="t" name="pregunta_id" type="hidden" value="{{ $preg->id }}">

                    <button type="submit" class="btn btn-warning" >Eliminar Pregunta</button>
                </div>
            </form>

            </div>
            </div>
            
            <br>
        @empty
            <div class="alert alert-danger">
            <h6>No se encontraron preguntas dentro de esta encuesta, ¡Crea alguna!</h6>
            </div> 
        @endforelse
        </div>
        </form>
        <a href="{{ route('encuestas.create', ['id' => $id]) }}" class="btn btn-secondary btn-lg btn-block mb-3" role="button" aria-pressed="true">Agregar Pregunta<br></a>
    <br>

    </div>
    <div class="col-md-3 "></div>
    </div>
    
    <br>
    
    

    
    
    <a href="{{ route('encuestas.editTitle', ['id' => $id]) }}" class="btn btn-secondary mb-3" role="button" aria-pressed="true">Editar Titulo<br></a>
    <br>

    
    
    <form method="POST" action="{{ url('encuesta/destroyPoll') }}" > <!-- boton eliminar pregunta-->
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        
        <input id="SktT1" name="titulo_id" type="hidden" value="{{ $id }}">

        <button type="submit" class="btn btn-warning">Eliminar Encuesta</button>
    </form>
    <br>
    
    <a href="{{ route('encuestas.index') }}" class="btn btn-primary mb-3" role="button" aria-pressed="true">Volver al inicio</a>
    
    
    
@endsection

