<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class opciones extends Model
{
    protected $table = 'opciones';

    protected $fillable = ['opcion_encuesta', 'pregunta_id'];

    //desactivando marcas de tiempo
    public $timestamps = false;
}
