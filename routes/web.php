<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|   
*/

//ruta principal al iniciar la aplicacion web
Route::get('/', 'EncuestaController@index')
    ->name('encuestas.index'); //lleva a la pagina index.blade.php


//envia a la pagina que muestra una encuesta
Route::get('/encuesta/{id}', 'EncuestaController@show') //usar el controlador @Show
    ->where('id', '[1-9]+')
    ->name('encuestas.show');//nombre encuestas.show referencia del html


//enviar al controlador que creara una pregunta
Route::post('/store', 'EncuestaController@store');


//envia a la pagina de creacion de pregunta (mediante el {id} se controla el numero de encuesta)
Route::get('/encuesta/nuevo/{id}', 'EncuestaController@create')
    ->name('encuestas.create');


//enviar al controlador que crea opciones
Route::get('/opciones/nuevo/{id}', 'EncuestaController@option')
    ->name('encuestas.option');


//envia al controlador que crea una opcion
Route::post('/storeOption', 'EncuestaController@storeOption');


//envia al controlador para modificar la pregunta
Route::get('/encuesta/pregunta/editar/{id}', 'EncuestaController@edit')
    ->name('encuestas.edit');


//modifica la pregunta en la base de datos
Route::put('/encuesta/pregunta/edit', 'EncuestaController@update');


//envia al controlador para modificar el titulo de la encuesta
Route::get('/encuesta/editar/{id}', 'EncuestaController@editTitle')
    ->name('encuestas.editTitle');


//modifica el titulo de la encuesta en la base de datos
Route::put('/encuesta/edit', 'EncuestaController@updateTitle');


//elimina la pregunta de la base de datos (y sus posibles opciones si es Pregunta Cerrada)
Route::delete('/encuesta/destroy', 'EncuestaController@delete');


//elimina la encuesta de la base (junto con sus preguntas y opciones)
Route::delete('/encuesta/destroyPoll', 'EncuestaController@deletePoll');

//envia al controlador para agregar titulo a la encuesta
Route::get('/encuesta/createPoll', 'EncuestaController@createPoll')
->name('encuestas.createPoll');

//crea una nueva encuesta en la base de datos
Route::post('/encuesta/createNewPoll', 'EncuestaController@createNewPoll')
    ->name('encuestas.createNewPoll');



