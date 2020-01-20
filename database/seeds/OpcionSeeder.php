<?php

use App\pregunta;
use Illuminate\Database\Seeder;

class OpcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //buscar un pregunta_id para el seeder
        $preguntaId = pregunta::where('pregunta_encuesta', '¿Qué te gustaria programar?')->value('id');
        $preguntaId2 = pregunta::where('pregunta_encuesta', '¿Qué lenguajes conoces?')->value('id');



        DB::table('opciones')->insert([
            'opcion_encuesta' => 'Videojuegos',
            'pregunta_id' => $preguntaId ,
        ]);

        DB::table('opciones')->insert([
            'opcion_encuesta' => 'Aplicaciones para smartphones',
            'pregunta_id' => $preguntaId ,
        ]);

        DB::table('opciones')->insert([
            'opcion_encuesta' => 'Páginas web',
            'pregunta_id' => $preguntaId,
        ]);

        DB::table('opciones')->insert([
            'opcion_encuesta' => 'Java',
            'pregunta_id' => $preguntaId2,
        ]);

        DB::table('opciones')->insert([
            'opcion_encuesta' => 'Python',
            'pregunta_id' => $preguntaId2,
        ]);

        DB::table('opciones')->insert([
            'opcion_encuesta' => 'Ninguno',
            'pregunta_id' => $preguntaId2,
        ]);


    }
}
