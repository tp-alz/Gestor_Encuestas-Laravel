<?php

use App\tipo;
use Illuminate\Database\Seeder;

class TituloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        

        DB::table('titulo')->insert([
            'titulo_encuesta' => 'Ingenieria Sistemas',
        ]);


        DB::table('titulo')->insert([
            'titulo_encuesta' => 'Ingenieria Civil',
        ]);


        
    }
}
