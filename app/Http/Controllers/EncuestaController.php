<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\titulo;
use App\tipo;
use App\pregunta;
use App\opciones;
use Illuminate\Http\Request;

class EncuestaController extends Controller
{

    //al iniciar la aplicacion nos lleva al inicio
    public function index()
    {

        //guarda en title todos los datos de la tabla titulo
        $title = titulo::all();
        $preguntas = pregunta::all(); 

        //no lleva a la pagina index.blade.php
        return view('encuestas.index', compact('title', 'preguntas')); //compact esta enviando la $title a la pagina index
    }






    
    public function show($id)//$id para obtener el numero de la encuesta
    {

        //consultas para obtener valores de una encuesta segun el id
        $titulo = titulo::where('id', $id)->value('titulo_encuesta');
        //$pregunta = pregunta::where('titulo_id', $id);
        $pregunta = DB::table('pregunta')
                ->where('titulo_id', '=',$id)
                ->get();
        $opciones = DB::table('opciones')
                ->get();
        //fin consultas



        //nos lleva a show.blade.php
        return view('encuestas.show', compact('titulo', 'pregunta','id', 'opciones'));//compact envia valores de la encuesta
    }






    //lleva a la pagina de creacion
    public function create($id_titulo)
    {   
        return view('encuestas.create', compact('id_titulo'));
    }

 

    //guarda la pregunta y regresa al inicio
    public function store()
    {   

        //carga todos los datos del formulario Y
        //validar que todos los datos esten llenos
        $data = request()->validate([
            'preguntai' => 'required', //campo obligatorio
            'hidId' => '', //cargar campo
            'radiob' => '', //cargar campo
        ], [
            'preguntai.required' => 'El campo titulo es obligatorio' //mensaje de error personalizado
        ]);


        //if controla si selecciono "Pregunta Abierta"
        if ($data['radiob'] ==  'open') {

            //cargar datos a una tabla de la base
            //tabla pregunta    
            pregunta::create([
                //campo donde guardare => que guardare
                'pregunta_encuesta' => $data['preguntai'], //guardo la pregunta
                'tipo_id' => '1',                           // guardo campo tipo = Pregunta Abierta
                'titulo_id' => $data['hidId'],              // guardo a que encuesta pertenece la pregunta
            ]);

            //regresa a la pagina de la encuesta
            return redirect()->route('encuestas.show', ['id' => $data['hidId'] ]);
        }
        

        //if controla si selecciono "Pregunta Cerrada"
        if ($data['radiob'] ==  'closed') {
            pregunta::create([
                'pregunta_encuesta' => $data['preguntai'], 
                'tipo_id' => '2',                           
                'titulo_id' => $data['hidId'],              
            ]);
            
            //regresa a la pagina de la encuesta
            return redirect()->route('encuestas.show', ['id' => $data['hidId'] ]);
        }  
        
    }

    public function option($pregunta_id)
    {   
        return view('encuestas.option', compact('pregunta_id'));
    }
    

    public function storeOption()
    {   

        
        //carga todos los datos del formulario Y
        //validar que todos los datos esten llenos
        $data = request()->validate([
            'optionInput' => 'required', //campo obligatorio
            'pregunta_id' => '', //cargar campo
        ], [
            'optionInput.required' => 'El campo es obligatorio' //mensaje de error personalizado
        ]);

        $titulo_id = pregunta::where('id','=', $data['pregunta_id'])->value('titulo_id');
         
        opciones::create([
            'opcion_encuesta' => $data['optionInput'],
            'pregunta_id' => $data['pregunta_id'],                 
        ]);

        //regresa a la pagina de la encuesta
        return redirect()->route('encuestas.show', ['id' => $titulo_id ]);

        
    }


    public function edit($pregunta_id)
    {
        return view('encuestas.edit', compact('pregunta_id'));
    }

    public function update()
    {
        $data = request()->validate([
            'pregunta_encuesta' => 'required',
            'pregunta_id' => '',
        ]);

        $titulo_id = pregunta::where('id','=', $data['pregunta_id'])->value('titulo_id');

        pregunta::where('id', $data['pregunta_id'])
            ->update([
                'pregunta_encuesta' => $data['pregunta_encuesta'],
        ]);

        return redirect()->route('encuestas.show', ['id' => $titulo_id ]);
    }




    public function editTitle($titulo_id)
    {
        return view('encuestas.editTitle', compact('titulo_id'));
    }

    public function updateTitle()
    {
        $data = request()->validate([
            'titulo_encuesta' => 'required',
            'titulo_id' => '',
        ]);


        titulo::where('id', $data['titulo_id'])
            ->update([
                'titulo_encuesta' => $data['titulo_encuesta'],
        ]);

        return redirect()->route('encuestas.show', ['id' => $data['titulo_id'] ]);
    }


    public function delete()
    {
        $data = request()->all();

        $titulo_id = pregunta::where('id','=', $data['pregunta_id'])->value('titulo_id');

        opciones::where('pregunta_id', $data['pregunta_id'])->delete();
        pregunta::where('id', $data['pregunta_id'])->delete();


        return redirect()->route('encuestas.show', ['id' => $titulo_id ]);

    }


    public function deletePoll()
    {
        $data = request()->all();

        //obtener preguntas relacionadas a una encuesta en especifico
        $opciones_id = DB::table('pregunta')
                ->where('titulo_id', '=',$data['titulo_id'])
                ->get();
        
        //decodificar el json a un array
        $opcionesdecoded=json_decode($opciones_id, true);
        
        //obtener numero de valores
        $cont = count($opcionesdecoded);
        
        //eliminando opciones
        for ($i=0; $i<$cont ;$i++){

            opciones::where('pregunta_id', $opcionesdecoded[$i]['id'])->delete();

        }

        pregunta::where('titulo_id', $data['titulo_id'])->delete();

        titulo::where('id', $data['titulo_id'])->delete();

        return redirect()->route('encuestas.index');

    }




    //enviar a pagina de creacion de encuesta
    public function createPoll()
    {
        return view('encuestas.createPoll');
    }



    //crear encuesta
    public function createNewPoll()
    {
        $data = request()->validate([
            'titulo_encuesta' => 'required',
        ]);

        titulo::create([
            //campo donde guardare => que guardare
            'titulo_encuesta' => $data['titulo_encuesta'],
        ]);

        return redirect()->route('encuestas.index');

    }


}
