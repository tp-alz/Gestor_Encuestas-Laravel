<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tipo extends Model
{

    //por defecto envia a la tabla tipos pero la nombre mal en la db
    //asignando nombre a la tabla
    protected $table = 'tipo';


    //desactivando marcas de tiempo
    public $timestamps = false;
}
