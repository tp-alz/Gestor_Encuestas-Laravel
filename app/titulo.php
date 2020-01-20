<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class titulo extends Model
{
    protected $table = 'titulo';

    protected $fillable = ['titulo_encuesta'];

    //desactivando marcas de tiempo
    public $timestamps = false;
}
