<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //truncate para eliminar tablas de la db
        $this->truncateTables([
            'tipo',
            'opciones',
            'pregunta',
            'titulo',
        ]);
        

        // $this->call(UsersTableSeeder::class);

        //llamado a los seeders
            $this->call(TipoSeeder::class);
            $this->call(TituloSeeder::class);
            $this->call(PreguntaSeeder::class);
            $this->call(OpcionSeeder::class);


    }


    //con este metodo se desactiva la verificacion de relaciones
    //solo asi se puede borrar las tablas
    protected function truncateTables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }

}
