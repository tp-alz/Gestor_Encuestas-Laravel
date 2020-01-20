<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pregunta extends Model
{
    protected $table = 'pregunta';

    protected $fillable = ['pregunta_encuesta', 'tipo_id', 'titulo_id'];

    //desactivando marcas de tiempo
    public $timestamps = false;
}
