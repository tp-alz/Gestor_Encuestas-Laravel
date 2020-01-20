<?php

use App\tipo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tipo::create([
            'tipo_encuesta' => 'Pregunta Abierta',
        ]);

        tipo::create([
            'tipo_encuesta' => 'Pregunta Cerrada',
        ]);


            

    }
}
