<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTituloIdToPregunta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pregunta', function (Blueprint $table) {
            $table->unsignedBigInteger('titulo_id');
            $table->foreign('titulo_id')->references('id')->on('titulo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pregunta', function (Blueprint $table) {
            $table->dropForeign(['titulo_id']);
            $table->dropColumn('titulo_id');
        });
    }
}
