@extends('layout')

@section('content')

    <h2 class="mt-5 mb-3">Encuestas Disponibles</h2>
    
    <div class="row">
    <div class="col-md-3 "></div>
    <div class="col-md-3 "></div>
    <div class="col-md-3 "></div>
    <div class="col-md-3 "></div>
        @forelse ($title as $titulo)
            

            <div class="card m-4" style="width: 18rem;">
            <div class="card-body">
            <h5 class="card-title">{{ $titulo->titulo_encuesta }}</h5>
            <p class="card-text">
                <?php
                $cont = 0;
                ?>
            @foreach($preguntas as $preg)
                @if ($preg->titulo_id == $titulo->id)
                <?php
                $cont = $cont+1;
                ?>
                @endif
            @endforeach
                Numero de preguntas <br>
                dentro de la encuesta:
                <?php
                echo $cont
                ?>
                
            </p>
            <a href="{{ route('encuestas.show', ['id' => $titulo->id]) }}" class="btn btn-primary">Ver detalles</a>
            </div>
            </div>


        @empty
            <div class="alert alert-danger">
            <h6>No se encontraron encuestas dentro del sistema, ¡Crea una!</h6>
            </div>
        @endforelse
    
    </div>



    <br>
    <a class="btn btn-secondary mb-3" role="button" aria-pressed="true" href="{{ route('encuestas.createPoll') }}" role="button">Crear Encuesta</a>
    <br>



@endsection




    
