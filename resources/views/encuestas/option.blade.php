@extends('layout')

@section('content')

    <div class="row">
    <div class="col-md-2 "></div>
    <div class="col-md-6 ">


    <h1 class="mt-5 mb-3">Agregar Opciones</h1>

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



    <form method="POST" action="{{ url('/storeOption') }}">
    <div class="form-group">
        {{ csrf_field() }}

        
        <input type="text" class="form-control" name="optionInput" id="p" placeholder="Ingrese la Opcion de la pregunta" value="{{ old('name') }}">
        
        <br>
        
        <input id="t" name="pregunta_id" type="hidden" value="{{ $pregunta_id}}">

        <button type="submit" class="btn btn-secondary mb-3" role="button" aria-pressed="true">Guardar Opcion</button>
    </form>
    </div>
    <a href="{{ route('encuestas.index') }}" class="btn btn-primary mb-3" role="button" aria-pressed="true">Volver al inicio<br></a>
    

    
    </div>
    <div class="col-md-3 "></div>
    </div>

@endsection