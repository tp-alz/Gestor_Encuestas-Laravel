<?php

use App\tipo;
use App\titulo;
use Illuminate\Database\Seeder;

class PreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //buscar un tipo_id para el seeder
        $tipoIdOpen = tipo::where('tipo_encuesta', 'Pregunta Abierta')->value('id');
        $tipoIdClosed = tipo::where('tipo_encuesta', 'Pregunta Cerrada')->value('id');

        //buscar un titulo_id para el seeder
        $tituloIdS = titulo::where('titulo_encuesta', 'Ingenieria Sistemas')->value('id');
        $tituloIdC = titulo::where('titulo_encuesta', 'Ingenieria Civil')->value('id');


        DB::table('pregunta')->insert([
            'pregunta_encuesta' => '¿Ya has programado antes?',
            'titulo_id' => $tituloIdS,
            'tipo_id' => $tipoIdOpen,
        ]);

        DB::table('pregunta')->insert([
            'pregunta_encuesta' => '¿Qué te gustaria programar?',
            'titulo_id' => $tituloIdS,
            'tipo_id' => $tipoIdClosed,
        ]);

        DB::table('pregunta')->insert([
            'pregunta_encuesta' => '¿Qué lenguajes conoces?',
            'titulo_id' => $tituloIdS,
            'tipo_id' => $tipoIdClosed,
        ]);

        DB::table('pregunta')->insert([
            'pregunta_encuesta' => '¿Qué sabes de ingenieria civil?',
            'titulo_id' => $tituloIdC,
            'tipo_id' => $tipoIdOpen,
        ]);

        DB::table('pregunta')->insert([
            'pregunta_encuesta' => '¿Por qué elegiste esta exposición?',
            'titulo_id' => $tituloIdC,
            'tipo_id' => $tipoIdOpen,
        ]);


    }
}
